<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            // Als de gebruiker geen admin is, redirect naar een andere pagina
            return redirect('/home');
        }

        return $next($request);
    }
}

