<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMember;
use App\Models\Group;
use App\Models\GroupMessages;
use App\Models\User;
use App\Models\GroupJoinrequest;
use App\Models\GroupInvitation;

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

        $groupInvites = GroupInvitation::where('invited_id', $userId)->get();
        $inviteGroupIds = $groupInvites->pluck('group_id');
        $inviteGroups = Group::whereIn('id', $inviteGroupIds)->get();

        return view('socials.groupsmain', ['groups' => $groups, 'groupInvites' => $groupInvites, 'inviteGroups' => $inviteGroups]);
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
        $existingGroup = Group::where('group_name', $request->groupname)->first();
        if ($existingGroup) {
            return redirect()->route('group-make')->with('error', 'Group name already taken');
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
        }

        return redirect()->route('groups-find.index')->with('success', 'Group created successfully');
    }

    public function overview($groupId)
    {
        $group = Group::findOrFail($groupId);
        $groupMembers = User::whereIn('id', function ($query) use ($groupId) {
            $query->select('member_id')
                ->from('group_members')
                ->where('group_id', $groupId);
        })->get();

        $groupMessages = GroupMessages::where('group_id', $groupId)->get();

        $joinRequests = GroupJoinrequest::where('group_id', $groupId)->get();

        return view('socials.group', compact('group', 'groupMembers', 'groupMessages', 'joinRequests'));
    }

    public function invite(Request $request, $groupId)
    {
        $validatedData = $request->validate([
            'invite' => 'required|string',
        ]);

        $user = User::where('name', $validatedData['invite'])->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        if (GroupMember::where('member_id', $user->id)->where('group_id', $groupId)->exists()) {
            return redirect()->back()->with('error', 'User is already a member of the group.');
        }

        if (GroupInvitation::where('group_id', $groupId)->where('invited_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Invitation already sent to this user.');
        }

        $invitation = new GroupInvitation();
        $invitation->group_id = $groupId;
        $invitation->invited_id = $user->id;
        $invitation->save();

        return redirect()->back()->with('success', 'Invitation sent successfully.');
    }

    public function acceptInvitation($groupId, $invitationId)
    {
        $invitation = GroupInvitation::findOrFail($invitationId);

        $newmember = new GroupMember();
        $newmember->group_id = $groupId;
        $newmember->member_id = $invitation->invited_id;
        $newmember->save();
        /*
        GroupMember::create([
            'group_id' => $groupId,
            'member_id' => $invitation->invited_id,
        ]);
        */

        $invitation->delete();

        return redirect()->back()->with('success', 'Invitation accepted successfully.');
    }

    public function rejectInvitation($invitationId)
    {
    
        $invitation = GroupInvitation::findOrFail($invitationId);
        $invitation->delete();

        return redirect()->back()->with('success', 'Invitation rejected successfully.');
    }

    public function requestJoin(Request $request, $groupId)
    {
        $userId = auth()->id();

        $isMember = GroupMember::where('group_id', $groupId)
            ->where('member_id', $userId)
            ->exists();

        if ($isMember) {
            return redirect()->route('groups-find.index')->with('error', 'You are already in the group.');
        }

        $existingRequest = GroupJoinrequest::where('group_id', $groupId)
            ->where('requester_id', $userId)
            ->exists();

        if ($existingRequest) {
            return redirect()->route('groups-find.index')->with('error', 'A join request has already been sent for this group.');
        }

    
        $joinRequest = new GroupJoinrequest();
        $joinRequest->group_id = $groupId;
        $joinRequest->requester_id = $userId;
        $joinRequest->save();

        return redirect()->route('groups-find.index')->with('success', 'Join request sent successfully.');
    }

    public function acceptRequest($groupId, $userId)
    {
        
        $newmember = new GroupMember();
        $newmember->group_id = $groupId;
        $newmember->member_id = $userId;
        $newmember->save();
        /*
        GroupMember::create([
            'group_id' => $groupId,
            'member_id' => $userId,
        ]);
        */
        
        GroupJoinrequest::where('group_id', $groupId)
            ->where('requester_id', $userId)
            ->delete();

        return redirect()->route('groups.overview', ['groupId' => $groupId])->with('success', 'Join request accepted successfully.');
    }

    public function denyRequest($groupId, $userId)
    {
        GroupJoinrequest::where('group_id', $groupId)
            ->where('requester_id', $userId)
            ->delete();

        return redirect()->route('groups.overview', ['groupId' => $groupId])->with('success', 'Join request denied.');
    }

    public function leaveGroup($groupId)
    {
        $userId = auth()->id();

        GroupMember::where('group_id', $groupId)->where('member_id', $userId)->delete();

        return redirect()->route('groups.uGroups')->with('success', 'You have left the group.');
    }

    public function sendGroupMessage(Request $request, $groupId)
    {
        $validatedData = $request->validate([
            'change' => 'required|string|max:255',
        ]);

        $groupMessage = new GroupMessages();
        $groupMessage->sender_id = auth()->user()->id;
        $groupMessage->group_id = $groupId;
        $groupMessage->message = $validatedData['change'];
        $groupMessage->save();

        
        return redirect()->route('groups.overview', ['groupId' => $groupId])->with('success', 'Message sent successfully!');

    }

}
