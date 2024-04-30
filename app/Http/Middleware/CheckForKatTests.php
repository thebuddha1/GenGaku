<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckForKatTests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) : Response
    {
        $lesson = $request->query('lesson');

        if ($lesson !== null) {
            if ((int)$lesson >= 1 && (int)$lesson <= auth()->user()->profileProgression->cur_ktkn) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'You have not unlocked this lesson yet.');
            }
        } else {
            return redirect()->back()->with('error', 'Lesson parameter is missing');
        }
    }
}
