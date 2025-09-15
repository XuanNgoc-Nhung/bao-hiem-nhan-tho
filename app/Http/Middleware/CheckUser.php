<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->session()->get('user');

        if (!$user) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vui lòng đăng nhập để tiếp tục.'
                ], 401);
            }

            return redirect()->route('user.index')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        } 
        if(!isset($user->cccd) || !isset($user->ma_hop_dong)){
            return redirect()->route('user.index')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
        return $next($request);
    }
}


