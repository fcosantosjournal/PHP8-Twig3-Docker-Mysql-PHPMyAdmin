<?php

namespace App\Model;

use App\Db\Db;

class RoutesModel {
  protected $db;
  protected $routesFromDb;
  protected $routes;

  public function __construct() {
    $this->db = new Db();
  }
  
  public function getRoutes() {
    
    // Get all routes from the database.
    $this->routesFromDb = $this->db->getAll('routes');
    
    $this->routes = [];

    foreach ($this->routesFromDb as $key => $route) {
      $this->routes[$route['name']] = [];
      $this->routes[$route['name']]['name'] = $route['name'];
      $this->routes[$route['name']]['controller'] = $route['controller'];
      $this->routes[$route['name']]['template'] = $route['template'];
    }
    
    return $this->routes;
  }

  public function getRoutesFromJsonFile() {
    $json = json_decode(file_get_contents(__DIR__ . '/../Model/JsonFiles/Routes.json'), true);
    return $json;
  }

}