<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not logged in
        if (!Auth::check()) {
            return redirect(route('auth-login-basic'));
        }

        return $next($request);
    }
}