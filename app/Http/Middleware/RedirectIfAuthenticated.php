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
            //dd(Auth::user()->id);
            //dd('testRedirecIfAutenticate');
            // if (Auth::user()->id == 37) {
            //     return redirect('/financing');
            // }else{
            //     return redirect('/home');
            // }
            return redirect('/painel');
        }

        return $next($request);
    }
}
