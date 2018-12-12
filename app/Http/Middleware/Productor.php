<?php

namespace App\Http\Middleware;

use Closure;

class Productor
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
        if (auth()->user()->type=='PRODUCTOR') {
            return $next($request);
        }
        else
            return abort(404);

    }
}
