<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupJoinrequest extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'requester_id'];
}
