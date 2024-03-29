<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katakana extends Model
{
    use HasFactory;

    protected $table = 'katakana';

    protected $fillable = [
        'character',
        'sound',
        'lesson',
    ];
}
