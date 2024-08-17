<?php

namespace App\Utils;

class Routes {

  public $routes;
  public $route;
  public $path;
  public $template;
  public $controller;

  // Constructor method is called when a new object is created.
  public function __construct() {
    $this->routes = $this->getRoutes();
    $this->route = $this->getRoute();
    $this->path = $this->getPathRoute($this->route);
    $this->template = $this->getTemplate($this->path);
    $this->controller = $this->getController($this->path);
  }

  // Routes array.
  public function getRoutes() {
    return [
      'home' => [
        'name' => 'home',
        'template' => 'home.html.twig',
        'controller' => 'App\Controller\HomeController',
      ],
      'about' => [
        'name' => 'about',
        'template' => 'about.html.twig',
        'controller' => 'App\Controller\AboutController',
      ],
      'contact' => [
        'name' => 'contact',
        'template' => 'contact.html.twig',
        'controller' => 'App\Controller\ContactController',
      ],
      '404' => [
        'name' => '404',
        'template' => '404.html.twig',
        'controller' => 'App\Controller\ErrorController',
      ],
    ];
  }

  public function getTemplate($path) {
    return $this->routes[$path]['template']; // Get the template from the routes array.
  }

  public function getController($path) {
    return $this->routes[$path]['controller']; // Get the controller from the routes array.
  }

  public function getRoute() {
    $this->route = $_SERVER['REQUEST_URI']; // Get the current route on browser.
    return $this->route;
  }

  public function getPathRoute($route) {
    $routeSplit = explode('/', $route); // Split the route by '/'.
    $pathRoute = $routeSplit[1]; // Get the first element of the array after split.
    if (empty($pathRoute)) {
      return 'home'; // If the route is empty, return home.
    } 
    $pathRoute = $this->clearRoute($pathRoute); // Clear the route.
    return $this->checkPathIfExist($pathRoute); // Check if the route exists.
  }

  public function clearRoute($route) {
    return preg_replace('/[^a-zA-Z0-9]/', '', $route); // Clear the route.
  }

  public function checkPathIfExist($route) {
    // Check if the route exists in the routes array.
    if (array_key_exists($route, $this->routes)) {
      return $this->routes[$route]['name']; // Return the route name.
    }
    return $this->routes['404']['name']; // If the route does not exist, return 404.
  }
}