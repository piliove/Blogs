<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if ( session('admin_login') ) {
            // 验证通过 进入下一步
            return $next($request);
        } else {
            // 返回到登录页面
            return redirect('admin/login/login');
        }
        
    }
}
