<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class lang
{

    public function handle(Request $request, Closure $next)
    {
        app()->setLocale(app('lang'));
        return $next($request);
    }
}
