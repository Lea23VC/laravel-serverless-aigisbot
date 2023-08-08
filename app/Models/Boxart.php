<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Boxart extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'image', 'image_hash'];
}