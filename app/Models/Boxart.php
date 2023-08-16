<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boxart extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'image', 'image_hash', 'width', 'height'];


    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
