<?php

namespace App\Http\Middleware;

use Closure;

class AuthTeachers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (false == Auth::guard('teacher')->check()) {
            return redirect()->route('view.login.teacher');
        }

        return $next($request);
    }
}
