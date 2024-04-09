<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'experience',
        'streak',
        'last_login',
        'logged_in_today',
        'finished_tests'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set default values
        $this->attributes['experience'] = 0;
        $this->attributes['streak'] = 1;
        $this->attributes['last_login'] = now();
        $this->attributes['logged_in_today'] = true;
        $this->attributes['finished_tests'] = 0;
    }
}
