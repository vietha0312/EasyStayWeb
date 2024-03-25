<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockUserFromAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->id_vai_tro === 1) {
            return redirect()->route('home'); // Hoặc bất kỳ route nào bạn muốn chuyển hướng người dùng về
        }

        return $next($request);
    }
}
