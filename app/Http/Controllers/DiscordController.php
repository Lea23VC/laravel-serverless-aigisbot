<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\Console;
use App\Enums\ConsoleEnum;
use App\Actions\Discord\GetRomsByCommand;
use App\Models\Game;

class DiscordController extends Controller
{
    //

    public function executeCommand(Request $request)
    {
        // Your public key can be found in your application in the Developer Portal
        $PUBLIC_KEY = config('services.discord.public_key');
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
                    // Execute the command and fetch ROMs along with their images
                    $roms = GetRomsByCommand::run($consoleEnum, $option['value']);
                    // use roms for every embed, and add the rom image if available
                    $embeds = collect($roms)->map(function ($item) {
                        $embed = [
                            'title' => $item['name'],
                            'color' => hexdec('fdf104'),
                            'fields' => [
                                [
                                    'value' => $item['url'],
                                    'inline' => false,
                                ],
                            ],
                        ];

                        if ($item['image']) {
                            $embed['image'] = ['url' => $item['image']];
                        }

                        return $embed;
                    })->toArray();



                    return response()->json([
                        'content' => 'Here are the ROMs you requested:',
                        'type' => 4, // Type 4 is for message responses
                        'data' => [
                            'embeds' => $embeds,
                        ],
                    ]);
                } catch (\Exception $e) {
                    // Instead of returning a response, throw an exception
                    throw new \Exception('Some error happened: ' . $e->getMessage());
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
