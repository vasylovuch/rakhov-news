<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Якщо користувач вже авторизований і намагається зайти на login/register
                return redirect()->route('news.create'); // <-- редірект на сторінку новини
            }
        }

        return $next($request);
    }
}
