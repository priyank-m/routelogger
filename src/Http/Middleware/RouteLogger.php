<?php

namespace Routelogger\Routelogger\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RouteLogger
{
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();

        if ($route) {
            $data = $route->getName() ?: $route->uri();
        } else {
            $data = $request->path();
        }

        Log::info('Route Name - ' . $data);

        return $next($request);
    }
}
