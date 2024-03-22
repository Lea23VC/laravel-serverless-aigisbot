<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiscordApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'discord_id', 'name', 'icon', 'description', 'type', 'summary', 'is_monetized',
        'bot_public', 'bot_require_code_grant', 'verify_key', 'flags', 'hook',
        'redirect_uris', 'interactions_endpoint_url', 'owner', 'approximate_guild_count',
        'interactions_event_types', 'interactions_version', 'explicit_content_filter',
        'rpc_application_state', 'store_application_state', 'verification_state',
        'integration_public', 'integration_require_code_grant', 'discoverability_state',
        'discovery_eligibility_flags', 'monetization_state', 'monetization_eligibility_flags',
        'team', 'integration_types', 'integration_types_config', 'internal_guild_restriction',
    ];

    protected $casts = [
        'redirect_uris' => 'array',
        'owner' => 'array',
        'interactions_event_types' => 'array',
        'integration_types' => 'array',
        'integration_types_config' => 'array',
    ];

    public function commands(): HasMany
    {
        return $this->hasMany(DiscordCommand::class);
    }
}
