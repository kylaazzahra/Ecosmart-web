<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!auth()->check()) {
            if ($request->is('auth/login')) {
                return $next($request);
            }
    
            return redirect()->route('auth.login')->with('error', 'You must be logged in to access this page');
        }
    
        return $next($request);
    }
}
