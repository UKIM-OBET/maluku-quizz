<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$routes = $app['router']->getRoutes();
echo 'route count: '.$routes->count()."\n";
foreach ($routes as $route) {
    echo $route->uri().' ['.implode(',', $route->methods())."]\n";
}
$request = Illuminate\Http\Request::create('/', 'GET');
$response = $kernel->handle($request);
echo 'status: '.$response->getStatusCode()."\n";
$route = $app['router']->current();
var_export($route);
$kernel->terminate($request, $response);
