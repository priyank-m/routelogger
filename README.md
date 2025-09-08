composer require routelogger/routelogger

then in App\Http Directory open Kernel.php file

paste the below code in routeMiddleware

'routelogger' => \Routelogger\Routelogger\Http\Middleware\RouteLogger::class

in your route use middleware as "routelogger"
