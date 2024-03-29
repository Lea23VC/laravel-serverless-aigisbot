<?php


namespace App\Jobs;

use App\Models\FinancialIndicator;
use App\Services\TCGScraper\TCGScraperService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendDiscordCardMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $interactionData;

    public function __construct($interactionData, private readonly TCGScraperService $service)
    {
        $this->interactionData = $interactionData;
        $this->service = $service;
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


        $response = $this->service->tcgScraper()->search($cardName, $apiType);


        $dolarValue = FinancialIndicator::first()->observed_dollar;

        if ($response->successful()) {
            $cards = $response->json();
            $cards = array_slice($cards, 0, 10); // Limit to 10 cards to avoid exceeding Discord embed limits

            $embeds = collect($cards)->map(function ($card) use ($dolarValue) {
                $fields = collect($card['sellers_info'])->take(3)->map(function ($seller) use ($dolarValue) { // Limiting sellers to 3 per card for brevity
                    return [
                        'name' => $seller['seller']['name'],
                        'value' => "Price: " . number_format($dolarValue * $seller['price']['USD'], 0, ',', '.') . " CLP (" . $seller['price']['USD'] . " USD) - Condition: " . $seller['condition'],
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
