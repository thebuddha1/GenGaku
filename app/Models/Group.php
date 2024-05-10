<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_owner_id',
        'group_name',
    ];

    public function groupMember()
    {
        return $this->hasMany(GroupMember::class);
    }

    public function groupMemssage()
    {
        return $this->hasMany(GroupMemssage::class);
    }

}
