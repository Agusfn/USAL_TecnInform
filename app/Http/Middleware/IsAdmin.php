<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        // must be used with auth middleware previously
        if($request->user()->esAdmin()) {
            return $next($request);
        }
        else {
            return redirect()->route('home');
        }   
    }
}
