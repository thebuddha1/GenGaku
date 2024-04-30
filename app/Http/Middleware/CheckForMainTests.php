<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckForMainTests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) : Response
    {
        // Extracting the lesson and chapter parameters from the request URL
        $lesson = $request->query('lesson');
        $chapter = $request->query('chapter');

        if ($lesson !== null && $chapter !== null) {
            if ((int)$chapter >= 1 && (int)$chapter <= auth()->user()->profileProgression->cur_chpt) {
                if ((int)$lesson >= 1 && (int)$lesson <= auth()->user()->profileProgression->cur_lsn) {
                    return $next($request);
                } else {
                    return redirect()->back()->with('error', 'Invalid lesson number or you have not unlocked this lesson yet.');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid chapter number or you have not unlocked this chapter yet.');
            }
        } else {
            return redirect()->back()->with('error', 'Lesson parameter is missing');
        }
    }
}
