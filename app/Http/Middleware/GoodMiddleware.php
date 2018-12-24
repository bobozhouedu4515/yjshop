<?php

namespace App\Http\Middleware;

use Closure;

class GoodMiddleware
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
        //管理商品的管路员的路由验证
        if (!auth ('admin')->user ()->hasAnyRole('goods-admin|superAdmin')){
          return  back ()->with ('danger','forbidden');
        }
        return $next($request);
    }
}
