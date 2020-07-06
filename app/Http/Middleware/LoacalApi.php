<?php

namespace App\Http\Middleware;

use Closure;

class LoacalApi
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
        // dd('local');

        return $next($request);
    }
}
