<?php

namespace App\Http\Middleware;

use Closure;

class OrderMiddleware
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
        if (!auth ('admin')->user ()->hasAnyRole('superAdmin|order-admin')){
            return  back ()->with ('danger','forbidden');
        }
        return $next($request);
    }
}
