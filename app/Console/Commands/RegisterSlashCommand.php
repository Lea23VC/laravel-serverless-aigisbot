<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class RegisterSlashCommand extends Command
{
    protected $signature = 'discord:register-card-command';

    protected $description = 'Registers the /card slash command globally with Discord';

    public function handle()
    {
        $applicationId = Config::get('services.discord.bot_id');
        $botToken = Config::get('services.discord.token');

        // Global commands endpoint, no guild ID required
        $url = "https://discord.com/api/v8/applications/{$applicationId}/commands";

        $response = Http::withHeaders([
            'Authorization' => "Bot {$botToken}",
            'Content-Type' => 'application/json',
        ])->post($url, [
            'name' => 'card',
            'description' => 'Search for a card from Yu-Gi-Oh!, Pokémon, or One Piece',
            'options' => [
                [
                    'name' => 'type',
                    'description' => 'Select the card type',
                    'type' => 3, // 3 represents a string
                    'required' => true,
                    'choices' => [
                        ['name' => 'Yu-Gi-Oh!', 'value' => 'yugioh'],
                        ['name' => 'Pokémon', 'value' => 'pokemon'],
                        ['name' => 'One Piece', 'value' => 'onepiece'],
                    ],
                ],
                [
                    'name' => 'card_info',
                    'description' => 'Enter the name or code of the card',
                    'type' => 3, // 3 represents a string
                    'required' => true,
                ],
            ],
        ]);

        if ($response->successful()) {
            $this->info('/card slash command registered globally successfully!');
        } else {
            $this->error('Failed to register /card slash command globally. Status code: ' . $response->status());
        }
    }
}
