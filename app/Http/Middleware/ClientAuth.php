<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientAuth
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
        // if (empty(Auth::guard('clients'))) {
        //     return route('login-client');
        // }
        // else {
        // return $next($request);
        // }
        // abort(403);
        // dd($request);
        // if (!auth('clients')->user()) {
        //     return route('login-client');
        // }
        return $next($request);
    }
}
