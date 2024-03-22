<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscordCommand extends Model
{
    use HasFactory;

    protected $fillable = [
        'command_id', 'application_id', 'version', 'default_member_permissions',
        'type', 'name', 'description', 'dm_permission', 'contexts',
        'integration_types', 'options', 'nsfw',
    ];

    protected $casts = [
        'contexts' => 'array',
        'integration_types' => 'array',
        'options' => 'array',
    ];
    public function application(): BelongsTo
    {
        return $this->belongsTo(DiscordApplication::class, 'discord_application_id');
    }
}
