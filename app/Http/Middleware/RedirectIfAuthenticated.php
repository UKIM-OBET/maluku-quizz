<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Session::get('user_id')) {
            return redirect()->route(Session::get('user_role') === 'guru' ? 'teacher.dashboard' : 'student.dashboard');
        }

        return $next($request);
    }
}
