<?php


namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendDiscordMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $interactionData;

    public function __construct($interactionData)
    {
        $this->interactionData = $interactionData;
    }

    public function handle()
    {
        // Extract details from $interactionData
        $options = $this->interactionData['data']['options']; // Ensure this path matches your data structure
        $cardType = $options[0]['value']; // 'yugioh', 'pokemon', or 'onepiece'
        $cardName = $options[1]['value']; // The name or code entered by the user

        // Map type to the API path
        $typeMap = ['yugioh' => 'yugioh', 'pokemon' => 'pokemon', 'onepiece' => 'one_piece'];
        $apiType = $typeMap[$cardType] ?? null;

        if (!$apiType) {
            // Handle unknown type
            return;
        }

        // Fetch card information from the API
        $response = Http::get("https://olazmvff49.execute-api.us-east-1.amazonaws.com/api/v1/search/{$apiType}/?name=" . urlencode($cardName));

        if ($response->successful()) {
            $cards = $response->json();
            $cards = array_slice($cards, 0, 10); // Limit to 10 cards to avoid exceeding Discord embed limits

            $embeds = collect($cards)->map(function ($card) {
                $fields = collect($card['sellers_info'])->take(3)->map(function ($seller) { // Limiting sellers to 3 per card for brevity
                    return [
                        'name' => $seller['seller']['name'],
                        'value' => "Price: " . number_format($seller['price']['CLP'], 0, ',', '.') . " CLP - Condition: " . $seller['condition'],
                        'inline' => true,
                    ];
                })->toArray();

                return [
                    'title' => $card['title'],
                    'color' => hexdec('fdf104'),
                    'url' => $card['link'],
                    'image' => ['url' => $card['card_image_url']],
                    'fields' => $fields,
                ];
            })->toArray();

            $responseMessage = [
                'content' => 'Here are the cards you requested:', // This message will be displayed before the embeds, you can change it to whatever you want
                'type' => 4, // Respond with message
                'embeds' => $embeds,
            ];

            // Use the interaction token and application ID to send a follow-up message
            $token = $this->interactionData['token'];
            $application_id = config("services.discord.bot_id", $this->interactionData['application_id']);
            $followupUrl = "https://discord.com/api/webhooks/{$application_id}/{$token}";


            Http::post($followupUrl, $responseMessage);
        }
    }
}
