<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Utils\TwigUtils;
use App\Utils\Routes;

$routes = new Routes();

if (class_exists($routes->controller)) {
    $controllerInstance = new $routes->controller;
}

// Get the data from the controller.
$data = $controllerInstance->index();

// Render the template.
$twig = new TwigUtils();
echo $twig->render($routes->template, [
    'routes' => $routes,
    'data' => $data,
]);

