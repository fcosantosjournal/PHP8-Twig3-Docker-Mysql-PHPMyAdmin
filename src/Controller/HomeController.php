<?php

namespace App\Controller;

use App\Db\Db;
use App\Controller\SessionController;

class HomeController {
  
  public $data;
  protected $db;

  public function __construct() {
    $this->db = new Db();
  }

  public function index() {
    $this->data = $this->db->getOneBy('path', 'home', 'paginas');

    $session = new SessionController();
    $this->data['logged'] = $session->getLogged();

    if ($this->data['logged']) {
      $this->data['user'] = $_SESSION['user'];
      $this->data['email'] = $_SESSION['email'];
    }

    return $this->data;
  }
}