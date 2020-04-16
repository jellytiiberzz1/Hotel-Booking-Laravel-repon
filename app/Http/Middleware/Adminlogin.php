<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Adminlogin
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
        if(Auth::check()) {
            if(Auth::user()->role > 0) {
                return $next($request);
            }else {
                return redirect()
                    ->route('login.admin')
                    ->with('error','Bạn không có quyền vào trang này');
            }
        }else {
            return redirect()
                ->route('login.admin')
                ->with('error','Đăng nhập để vào trang quản trị');
        }
    }
}
