<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Список маршрутів, які не потребують CSRF перевірки.
     */
    protected $except = [
        //
    ];
}
