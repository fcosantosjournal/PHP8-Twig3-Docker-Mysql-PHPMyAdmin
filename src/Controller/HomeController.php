<?php

namespace App\Controller;

class HomeController {
  
  public $data;

  public function __construct() {
    $this->data = [
      'title' => 'Página Inicial',
      'message' => 'Bem-vindo à página inicial do projeto.',
    ];
  }

  public function index() {
    return $this->data;
  }
}