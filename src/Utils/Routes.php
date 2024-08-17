<?php

namespace App\Utils;

class Routes {

    public $routes;
    public $route;
    public $path;

    public function __construct() {
      $this->routes = $this->getRoutes();
      $this->route = $this->getRoute();
      $this->path = $this->getPathRoute($this->route);
    }

    public function getRoutes() {
      return [
        'home' => [
          'name' => 'home',
          'template' => 'home.html.twig',
          'controller' => 'App\Controllers\HomeController',
          'title' => 'Aula Inicial PHP + Twig',
        ],
        'about' => [
          'name' => 'about',
          'template' => 'about.html.twig',
          'controller' => 'App\Controllers\AboutController',
        ],
        'contact' => [
          'name' => 'contact',
          'template' => 'contact.html.twig',
          'controller' => 'App\Controllers\ContactController',
        ],
        '404' => [
          'name' => '404',
          'template' => '404.html.twig',
          'controller' => 'App\Controllers\ErrorController',
        ],
      ];
    }

    public function getRoute() {
      $this->route = $_SERVER['REQUEST_URI'];
      return $this->route;
    }

    public function getPathRoute($route) {
      $routeSplit = explode('/', $route);
      $controller = $routeSplit[1];
      if (empty($controller)) {
        $controller = 'home';
      } else {
        $controller = $this->clearRoute($controller);
      }
      $controller = $this->checkPathIfExist($controller);
      return $controller;
    }

    public function clearRoute($route) {
      return preg_replace('/[^a-zA-Z0-9]/', '', $route);
    }

    public function checkPathIfExist($route) {
      if (array_key_exists($route, $this->routes)) {
        return $this->routes[$route]['name'];
      } else {
        return $this->routes['404']['name'];
      }
    }
}