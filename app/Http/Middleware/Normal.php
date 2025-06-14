<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Normal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if (!$user) {
            // Redirect to login if not logged in
            return redirect('/');
        }

        if ($user->role == 1) {
            // Redirect or abort if role is not admin
            return redirect()->route('admin');
        }
        return $next($request);
    }
}
