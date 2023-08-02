<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'boxart',
        'password',
        'release_date',
        'console_id',
        'developer',
        'publisher',
        'genre',
        'players',
        'availability',
        'created_at',
        'updated_at',
    ];

    public function console(): BelongsTo
    {
        return $this->belongsTo(Console::class);
    }
}
