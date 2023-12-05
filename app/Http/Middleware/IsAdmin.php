<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
    if (!auth()->user() || !auth()->user()->is_admin) {
        return redirect('/'); // 或者返回一个错误
    }

    return $next($request);
    }
}
