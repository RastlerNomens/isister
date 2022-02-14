<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware {
    public function handle($request, Closure $next, $permission) {
        if(!$request->user()->can($permission)) {
            abort(404);
        }

        return $next($request);
    }
}