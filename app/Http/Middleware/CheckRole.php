<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $level): Response
    {
        if (Auth::user()->level != $level) {
            if ($request->expectsJson()) {
                // return response()->json(['error' => 'Unauthorized'], 403);
                return response()->json([
                    'success' => false,
                    'error' => 'You do not have the required access level to view this resource.',
                    'required_level' => $level,
                    'user_level' => Auth::user()->level,
                ], 403);
            } else {
                session()->flash('error', 'You do not have the required access level to view this resource.');
                return redirect('/login');
            }
        }
        return $next($request);
    }
}
