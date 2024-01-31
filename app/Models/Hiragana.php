<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiragana extends Model
{
    use HasFactory;

    protected $fillable = [
        'character',
        'sound',
        'lesson',
    ];
}
