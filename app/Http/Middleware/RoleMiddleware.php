<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
        //全站职责分配的拦截,只有超级管理员客户控制
        if (!auth ('admin')->user ()->hasRole('superAdmin')){
            return  back ()->with ('danger','forbidden');
        }
        return $next($request);
    }
}
