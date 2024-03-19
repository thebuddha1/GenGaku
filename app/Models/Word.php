<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $table = 'words';

    protected $fillable = [
        'word',
        'word_hir',
        'word_rom',
        'meaning',
        'meaning_en',
        'chapter',
        'lesson',
    ];

}
