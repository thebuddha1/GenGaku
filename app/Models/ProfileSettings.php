<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kanji',
        'hiragana',
        'romanji',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
