<?php

namespace Routelogger\Routelogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Routelogger\Routelogger\Http\Middleware\RouteLogger;

class RouteloggerServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        // Register middleware alias
        $router->aliasMiddleware('routelogger', RouteLogger::class);

        // Apply middleware to configured groups
        $groups = config('routelogger.groups', ['api']);
        foreach ($groups as $group) {
            $router->pushMiddlewareToGroup($group, RouteLogger::class);
        }

        // Publish config (optional)
        $this->publishes([
            __DIR__.'/../config/routelogger.php' => config_path('routelogger.php'),
        ], 'config');
    }

    public function register()
    {
        //
    }
}
