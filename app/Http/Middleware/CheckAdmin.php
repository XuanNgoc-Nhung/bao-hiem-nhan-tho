<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = session('user');
        if (!$check || $check->role != 1) {
            return redirect('/admin/dang-nhap')->with('error', 'Bạn không có quyền truy cập trang này');
        }
        return $next($request);
    }
}
