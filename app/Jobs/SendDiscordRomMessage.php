<?php


namespace App\Jobs;

use App\Actions\Discord\GetRomsByCommand;
use App\Enums\ConsoleEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendDiscordRomMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $interactionData;

    // Modify the constructor to only expect $interactionData. Laravel will auto-inject the TCGScraperService.
    public function __construct($interactionData)
    {
        $this->interactionData = $interactionData;
    }

    public function handle()
    {
        // Extract the first option from the 'options' array
        $data = $this->interactionData['data'];

        // Get the console enum based on the 'name' from the first option
        $consoleEnum = ConsoleEnum::fromValue($data['name']);

        if (!$consoleEnum) {
            return response()->json([
                'type' => 2,
                'content' => 'No roms found.',
            ]);
        }

        // Execute the command and fetch ROMs along with their images
        $roms = GetRomsByCommand::run($consoleEnum, $data['options'][0]['value']);

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

        $responseMessage = [
            'content' => 'Here are the ROMs you requested:',
            'type' => 4, // Type 4 is for message responses
            'data' => [
                'embeds' => $embeds,
            ],
        ];

        // Use the interaction token and application ID to send a follow-up message
        $token = $this->interactionData['token'];
        $application_id = config("services.discord.bot_id", $this->interactionData['application_id']);
        $followupUrl = "https://discord.com/api/webhooks/{$application_id}/{$token}";

        Http::post($followupUrl, $responseMessage);
    }
}
