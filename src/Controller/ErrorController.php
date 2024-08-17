<?php

namespace App\Controller;

class ErrorController {

  public $data;
  
  public function __construct() {
    $this->data = [
      'title' => 'Página não encontrada',
      'message' => 'A página que você está tentando acessar não existe.',
    ];
  }

  public function index() {
    return $this->data;
  }
}