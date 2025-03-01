<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if user is authenticated and has the correct role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect to login with error message if access is denied
        return redirect()->route('login')->with('error', 'Access denied. You do not have permission to access this page.');
    }
}
