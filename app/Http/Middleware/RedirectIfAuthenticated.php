<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
<<<<<<< HEAD

            // if (Auth::user()->role == 'admin') {
            //     return redirect('/admin');
            // }else{
            //     return redirect('/');
            // }
=======
>>>>>>> 0ae3c23096ea6432cf9e357590306b60c7da0d78
            return redirect('/painel');
        }

        return $next($request);
    }
}
