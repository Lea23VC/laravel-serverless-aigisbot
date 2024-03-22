<?php

namespace App\Actions\Discord;

use Illuminate\Http\Request;
use Log;
use App\Models\Console;
use App\Enums\ConsoleEnum;
use App\Actions\Discord\GetRomsByCommand;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetRomsResponse
{
    use AsAction;
    protected $data;


    public function handle($data): JsonResponse
    {
        $consoleEnum = ConsoleEnum::fromValue($data['name']);
        if (!$consoleEnum) {
            return response()->json([
                'type' => 2,
                'content' => 'No roms found.',
            ]);
        }
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
                        'name' => 'Download',
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
    }
}
