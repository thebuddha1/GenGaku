<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMember;
use App\Models\Group;
use App\Models\GroupMessages;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('socials.findgroups', ['groups' => $groups]);
    }

    public function userGroups()
    {
        $userId = auth()->id();
        
        $groupMemberIds = GroupMember::where('member_id', $userId)->pluck('group_id');
        $groups = Group::whereIn('id', $groupMemberIds)->get();

        return view('socials.groupsmain', ['groups' => $groups]);
    }

    public function makeGroup(Request $request)
    {
        $request->validate([
            'groupname' => 'required|string|max:255',
            'groupmessage' => 'nullable|string',
        ]);

        if (empty($request->groupname)) {
            return redirect()->route('group-make')->with('error', 'Group name cannot be empty');
        }
        else{
            $group = new Group();
            $group->group_owner_id = auth()->user()->id;
            $group->group_name = $request->groupname;
            $group->save();

            $member = new GroupMember();
            $member->group_id = $group->id;
            $member->member_id = auth()->user()->id;
            $member->save();
        }

        if (!empty($request->groupmessage)) {
            $message = new GroupMessages();
            $message->sender_id = auth()->user()->id;
            $message->group_id = $group->id;
            $message->message = $request->groupmessage;
            $message->save();
        } else {
            $message = new GroupMessages();
            $message->sender_id = auth()->user()->id;
            $message->group_id = $group->id;
            $message->message = 'No group message yet';
            $message->save();
        }

        return redirect()->route('groups-find.index')->with('success', 'Group created successfully');
    }

    public function sendInvite(){

    }

    public function sendJoinRequest(){

    }

}
