<?php

namespace Routelogger\Routelogger\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class RouteLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!Config::get('routelogger.enabled', true)) {
            return $response;
        }

        $route = $request->route();
        $data = $route ? ($route->getName() ?: $route->uri()) : $request->path();

        $emoji = Config::get('routelogger.emoji', '🚦');
        $border = Config::get('routelogger.border', '============================');
        $method = $request->method();
        $status = $response->getStatusCode();

        $log = "\n$border\n";
        $log .= "$emoji Route Logger\n";
        $log .= "Route Name : $data\n";

        if (Config::get('routelogger.log_method', true)) {
            $log .= "Method     : $method\n";
        }

        if (Config::get('routelogger.log_status', true)) {
            $log .= "Status     : $status\n";
        }

        $log .= "$border\n";

        Log::info($log);

        return $response;
    }
}
