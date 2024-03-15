<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */


    public function handle(Request $request, Closure $next): Response
    {
//        if (!auth()->check() || !auth()->user()->is_admin)
//        if (!auth()->check() || !auth()->user()->$middleware->is_admin) {
//            abort(403);
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}

