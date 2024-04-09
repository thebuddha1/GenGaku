<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMember;
use App\Models\Group;

class GroupsController extends Controller
{
    public function index()
    {
        // Get the ID of the currently logged-in user
        $userId = auth()->id();

        // Retrieve groups where the logged-in user is a member
        $groups = Group::join('group_members', 'groups.id', '=', 'group_members.group_id')
                    ->where('group_members.member_id', $userId)
                    ->select('groups.*')
                    ->distinct()
                    ->get();

        // Pass the groups variable to the view
        return view('socials\groupsmain', ['groups' => $groups]);
    }

    public function makeGroup(){

    }

    public function sendInvite(){

    }

    public function sendJoinRequest(){

    }

}
