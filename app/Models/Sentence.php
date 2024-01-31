<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;

    protected $fillable = [
        'sentence',
        'sentence_hir',
        'sentence_rom',
        'meaning',
        'meaning_en',
        'chapter',
        'lesson',
    ];
}
