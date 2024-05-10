<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'group_id',
        'message',
    ];

    public function group()
    {
        return $this->belongsTo(Gropup::class);
    }
}
