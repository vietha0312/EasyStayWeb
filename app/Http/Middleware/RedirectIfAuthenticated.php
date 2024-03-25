<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                if ($user && ($user->id_vai_tro === 2 || $user->id_vai_tro === 3)) {
                    return redirect()->route('admin'); // Chuyển hướng đến trang quản trị
                } else {
                    return redirect(RouteServiceProvider::HOME); // Chuyển hướng đến trang chính
                }
            }
        }

        return $next($request);
    }
}
