<?php

namespace Routelogger\Routelogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Routelogger\Routelogger\Http\Middleware\RouteLogger;

class RouteloggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(Router $router)
    {
        // Register middleware alias (optional, but nice to have)
        $router->aliasMiddleware('routelogger', RouteLogger::class);

        // ✅ Automatically attach to API group
        $router->pushMiddlewareToGroup('api', RouteLogger::class);
    }

    /**
     * Register services.
     */
    public function register()
    {
        //
    }
}
