<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGroups
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $groupId = $request->route('groupId');

        if ($this->userIsMemberOfGroup($groupId)) {
            return $next($request);
        }
        return redirect()->back();
    }

    private function userIsMemberOfGroup($groupId): bool
    {
        $userId = auth()->user()->id;

        return \DB::table('group_members')
            ->where('group_id', $groupId)
            ->where('member_id', $userId)
            ->exists();
    }
}
