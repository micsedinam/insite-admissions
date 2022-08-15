<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::check() == false) {
            //dd(Auth::check());
            return redirect('/')->with('error', "Session timed out.");
        }
        

        if(auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }
        
        if (auth()->check() && auth()->user()->is_admin == 2) {
            return $next($request);
        }
        
        return redirect('user/home')->with('error', "You don't have access.");
    }
}
