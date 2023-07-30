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
        'release_date',
        'console_id',
        'developer',
        'publisher',
        'genre',
        'players',
        'availability'
    ];

    public function console(): BelongsTo
    {
        return $this->belongsTo(Console::class);
    }
}
