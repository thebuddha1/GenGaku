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

    public function makeGroup(Request $request)
    {
        // Validate the form data
        $request->validate([
            'groupname' => 'required|string|max:255',
            'groupmessage' => 'nullable|string',
        ]);

        // Check if groupname is empty
        if (empty($request->groupname)) {
            return redirect()->route('/group-make')->with('error', 'Group name cannot be empty');
        }
        else{
            // Create a new group
            $group = new Group();
            $group->group_owner_id = auth()->user()->id;
            $group->group_name = $request->groupname;
            $group->save();
        }


        // Save group message if textarea is not empty
        if (!empty($request->groupmessage)) {
            $message = new GroupMessages();
            $message->sender_id = auth()->user()->id;
            $message->group_id = $group->id;
            $message->message = $request->groupmessage;
            $message->save();
        } else {
            // Save default message if textarea is empty
            $message = new GroupMessages();
            $message->sender_id = auth()->user()->id;
            $message->group_id = $group->id;
            $message->message = 'No group message yet';
            $message->save();
        }

        //isten se tudja miért nem de az annyáért se találja meg a routot
        //a többi része jó
        return redirect()->route('/groups')->with('success', 'Group created successfully');
    }

    public function sendInvite(){

    }

    public function sendJoinRequest(){

    }

}
