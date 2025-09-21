<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // Якщо запит не AJAX, редіректимо на login
        if (!$request->expectsJson()) {
            return route('login'); // <--- обов'язково route('login')
        }
    }
}
