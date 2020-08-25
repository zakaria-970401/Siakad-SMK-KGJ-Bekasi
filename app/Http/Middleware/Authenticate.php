<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        {
            if (Auth::guard('admin')->check()) {
        
              return redirect('/admin');
        
            } else if (Auth::guard('web')->check()) {
        
              return redirect('/login');
              
            } else if (Auth::guard('teacher')->check()) {
        
              return redirect('/guru');
              
            }
          }
        }
}
