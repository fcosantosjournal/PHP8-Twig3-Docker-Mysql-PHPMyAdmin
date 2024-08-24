<?php

namespace App\Controller;

use App\Db\Db;

class HomeController {
  
  public $data;
  protected $db;

  public function __construct() {
    $this->db = new Db();
  }

  public function index() {
    $this->data = $this->db->getOneBy('path', 'home', 'paginas');
    return $this->data;
  }
}