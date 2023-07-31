<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\Game;
use App\Models\Console;
use App\Enums\ConsoleEnum;

class DiscordController extends Controller
{
    //

    public function executeCommand(Request $request)
    {
        // Your public key can be found in your application in the Developer Portal
        $PUBLIC_KEY = config('services.discord.public_key');
        Log::info("PUBLIC_KEY: " . $PUBLIC_KEY);
        $headers = $request->headers->all();
        $signature = $headers['x-signature-ed25519'][0] ?? null;
        $timestamp = $headers['x-signature-timestamp'][0] ?? null;
        $body = $request->getContent();


        $isVerified = sodium_crypto_sign_verify_detached(
            hex2bin($signature),
            $timestamp . $body,
            hex2bin($PUBLIC_KEY)
        );

        $bodyData = json_decode($body, true);

        if ($bodyData['type'] == 1 && $isVerified) {
            return response()->json([
                'type' => 1,
            ]);
        }

        if ($bodyData['type'] == 2 && $isVerified) {
            $data = $bodyData['data'];
            // $config = collect(config('games'))->first(function ($game) use ($data) {
            //     return $game['name'] == $data['name'];
            // });
            $consoleEnum = ConsoleEnum::fromValue($data['name']);

            if ($consoleEnum) {
                try {
                    $option = $data['options'][0];
                    Log::info("option: " . $option["value"]);
                    $roms = \App\Models\Console::where('name', $consoleEnum->value)
                        ->first()
                        ->games()
                        ->select('name', 'url')
                        ->when($option["value"], function ($query, $searchValue) {
                            return $query->where('name', 'LIKE', '%' . $searchValue . '%');
                        })
                        ->limit(10)
                        ->get()
                        ->map(function ($game) {
                            $name = $game->name;
                            $url = $game->url;
                            $password = $game->password;

                            // Include the password in the array only if it exists
                            if ($password) {
                                return "$name: $url (Password: $password)";
                            }

                            return "$name: $url";
                        })
                        ->toArray();

                    return response()->json([
                        'type' => 4,
                        'data' => [
                            'content' => 'Here are the roms you requested:  ' . PHP_EOL . PHP_EOL . implode(PHP_EOL . PHP_EOL, $roms),
                        ],
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'type' => 4,
                        'data' => [
                            'content' => 'Some error happened. ' . $e->getMessage(),
                        ],
                    ]);
                }
            } else {
                return response()->json([
                    'type' => 2,
                    'content' => 'No roms found.',
                ]);
            }
        } else {
            return response('invalid request signature', 401);
        }
    }
}
