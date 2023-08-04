<?php

use Pokedex\Controllers\MainController;

require __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath($_SERVER['BASE_URI']);

$router->map(
    'GET',
    "/",
    [
        'controller' => MainController::class,
        'method' => 'index'
    ],
    "index"
);

$router->map(
    'GET',
    '/detail/[i:numero]',
    [
        'controller' => MainController::class,
        'method' => 'detail'
    ],
    'detail'
);

$router->map(
    'GET',
    '/types',
    [
        'controller' => MainController::class,
        'method' => 'types'
    ],
    'types'
);

$router->map(
    'GET',
    '/type/[i:type]',
    [
        'controller' => MainController::class,
        'method' => 'type',
    ],
    'type'
);

$match = $router->match();

// match de la route avec le controller
if ($match) {
    $controller = new $match['target']['controller'];
    $method = $match['target']['method'];
    $params = $match['params'];
    $controller = new $controller();
    // dispatcher
    $controller->$method($params);
} else {
    $controller->notFound();
}
