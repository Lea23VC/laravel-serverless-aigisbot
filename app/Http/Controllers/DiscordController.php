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
                    // Execute the command and fetch ROMs along with their images
                    $roms = GetRomsByCommand::run($consoleEnum, $option['value']);

                    // Prepare the ROMs list as a string, each on a new line, and fetch the first image URL
                    $romsList = collect($roms)->map(function ($item) {
                        return $item['rom']; // Extract just the ROM details for the list
                    })->implode(PHP_EOL);

                    // Attempt to fetch the first image URL from the ROMs, if available
                    $imageUrl = collect($roms)->map(function ($item) {
                        return $item['image']; // Extract the image URLs
                    })->first();

                    // Create an embed message with rich formatting, including the first image found
                    $embed = [
                        'title' => 'ROMs List',
                        'description' => 'Here are the ROMs you requested:',
                        'color' => hexdec('5865F2'), // Discord Blurple
                        'fields' => [
                            [
                                'name' => 'Requested ROMs',
                                'value' => !empty($romsList) ? $romsList : 'No ROMs found.', // Ensure there's a fallback if no ROMs
                                'inline' => false,
                            ],
                        ],

                    ];

                    if ($imageUrl) {
                        $embed['image'] = ['url' => $imageUrl];
                    }

                    return response()->json([
                        'type' => 4, // Type 4 is for message responses
                        'data' => [
                            'embeds' => [$embed], // Embeds must be an array of embed objects
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
