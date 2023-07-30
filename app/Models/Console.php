<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Console extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fullname',
        'nasos',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
