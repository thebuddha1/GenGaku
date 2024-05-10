<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGroupMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $memberId = $request->route('memberId');

        $userId = auth()->user()->id;

        if ($this->usersAreInSameGroup($userId, $memberId)) {
            return $next($request);
        }

        return redirect()->back();
    }

    private function usersAreInSameGroup($userId, $memberId): bool
    {
        $userGroups = \DB::table('group_members')
            ->where('member_id', $userId)
            ->pluck('group_id');

        $memberGroups = \DB::table('group_members')
            ->where('member_id', $memberId)
            ->pluck('group_id');

        foreach ($userGroups as $userGroup) {
            if ($memberGroups->contains($userGroup)) {
                return true;
            }
        }

        return false;
    }
}
