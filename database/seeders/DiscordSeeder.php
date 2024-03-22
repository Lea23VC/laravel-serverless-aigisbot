<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscordApplication;
use App\Models\DiscordCommand;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DiscordSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();

        try {
            $botToken = Config::get('services.discord.token');

            $applicationResponse = Http::withHeaders([
                'Authorization' => "Bot {$botToken}",
                'Content-Type' => 'application/json',
            ])->get('https://discord.com/api/applications/648760607012683787');

            if (!$applicationResponse->successful()) {
                throw new \Exception('Failed to fetch Discord application: ' . $applicationResponse->body());
            }

            $applicationData = $applicationResponse->json();

            $application = DiscordApplication::updateOrCreate(
                ['discord_id' => $applicationData['id']],
                [
                    'name' => $applicationData['name'],
                    'icon' => $applicationData['icon'],
                    'description' => $applicationData['description'],
                    'type' => $applicationData['type'] ?? null,
                    'summary' => $applicationData['summary'] ?? '',
                    'is_monetized' => $applicationData['is_monetized'] ?? false,
                    'bot_public' => $applicationData['bot_public'] ?? false,
                    'bot_require_code_grant' => $applicationData['bot_require_code_grant'] ?? false,
                    'verify_key' => $applicationData['verify_key'],
                    'flags' => $applicationData['flags'] ?? 0,
                    'hook' => $applicationData['hook'] ?? false,
                    'redirect_uris' => json_encode($applicationData['redirect_uris'] ?? []),
                    'interactions_endpoint_url' => $applicationData['interactions_endpoint_url'],
                    'owner' => json_encode($applicationData['owner']),
                    'approximate_guild_count' => $applicationData['approximate_guild_count'] ?? 0,
                    'interactions_event_types' => json_encode($applicationData['interactions_event_types'] ?? []),
                    'interactions_version' => $applicationData['interactions_version'] ?? 1,
                    'explicit_content_filter' => $applicationData['explicit_content_filter'] ?? 0,
                    'rpc_application_state' => $applicationData['rpc_application_state'] ?? 0,
                    'store_application_state' => $applicationData['store_application_state'] ?? 0,
                    'verification_state' => $applicationData['verification_state'] ?? 0,
                    'integration_public' => $applicationData['integration_public'] ?? false,
                    'integration_require_code_grant' => $applicationData['integration_require_code_grant'] ?? false,
                    'discoverability_state' => $applicationData['discoverability_state'] ?? 0,
                    'discovery_eligibility_flags' => json_encode($applicationData['discovery_eligibility_flags'] ?? []),
                    'monetization_state' => $applicationData['monetization_state'] ?? 0,
                    'monetization_eligibility_flags' => json_encode($applicationData['monetization_eligibility_flags'] ?? []),
                    'team' => json_encode($applicationData['team'] ?? []),
                    'integration_types' => json_encode($applicationData['integration_types'] ?? []),
                    'integration_types_config' => json_encode($applicationData['integration_types_config'] ?? []),
                    'internal_guild_restriction' => $applicationData['internal_guild_restriction'] ?? false,
                ]
            );

            $commandsResponse = Http::withHeaders([
                'Authorization' => "Bot {$botToken}",
                'Content-Type' => 'application/json',
            ])->get("https://discord.com/api/applications/{$application->discord_id}/commands");

            if (!$commandsResponse->successful()) {
                throw new \Exception('Failed to fetch Discord commands: ' . $commandsResponse->body());
            }

            $commands = $commandsResponse->json();

            foreach ($commands as $command) {
                DiscordCommand::updateOrCreate(
                    ['command_id' => $command['id']],
                    [
                        'discord_application_id' => $application->id, // 'discord_application_id' => $application->id,
                        'command_id' => $command['id'],
                        'application_id' => $command['application_id'],
                        'version' => $command['version'],
                        'default_member_permissions' => $command['default_permission'] ?? true,
                        'type' => $command['type'],
                        'name' => $command['name'],
                        'description' => $command['description'],
                        'dm_permission' => $command['default_permission'] ?? true,
                        'contexts' => json_encode($command['context'] ?? []),
                        'integration_types' => json_encode($command['integration_types'] ?? []),
                        'options' => json_encode($command['options'] ?? []),
                        'nsfw' => $command['nsfw'] ?? false,


                    ]
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
