<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request. middleware to verify user is admin for web.php admin routes. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // This is a Before & After Middleware request.  
    public function handle($request, Closure $next)
    {
        // If the logged in user is_admin is not equal to one redirect the user to the homepage.
        if (Auth::user()->is_admin !== 1) {
                return redirect('dashboard');
            } 
        // else make the request from the route group on the TasksController.      
        return $next($request);
    }
}

// If middleware is used in routes, it needs to be assigned the middleware key in kernel.php.  
