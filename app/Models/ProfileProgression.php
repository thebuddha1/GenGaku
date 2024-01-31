<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileProgression extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cur_chpt',
        'cur_lsn',
        'fnshd_tsts',
        'cur_hrgn',
        'cur_ktkn',
        'cur_fnshd_tsts'
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
