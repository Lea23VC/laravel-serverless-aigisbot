<?php

namespace App\Actions\Discord;

use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCardInfoResponse
{
    use AsAction;

    public function handle($data): array
    {
        $typeMap = [
            'yugioh' => 'yugioh',
            'pokemon' => 'pokemon',
            'onepiece' => 'one_piece',
        ];

        $type = $typeMap[$data['options'][0]['value']] ?? null;
        $nameOrCode = urlencode($data['options'][1]['value']);

        if (!$type) {
            return [
                'type' => 4,
                'data' => [
                    'content' => "Invalid card type selected.",
                ],
            ];
        }

        $url = "https://olazmvff49.execute-api.us-east-1.amazonaws.com/api/v1/search/{$type}/?name={$nameOrCode}";

        $response = Http::get($url);

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
                    'url' => $card['link'],
                    'image' => ['url' => $card['card_image_url']],
                    'fields' => $fields,
                ];
            })->toArray();

            return [
                'content' => 'Here are the cards you requested:', // This message will be displayed before the embeds, you can change it to whatever you want
                'type' => 4, // Respond with message
                'data' => [
                    'embeds' => $embeds,
                ],
            ];
        } else {
            return [
                'type' => 4,
                'data' => [
                    'content' => "Failed to fetch card information.",
                ],
            ];
        }
    }
}
