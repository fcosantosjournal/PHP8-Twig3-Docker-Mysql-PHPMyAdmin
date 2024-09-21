<?php

namespace App\Controller;

class LogoutController {
  
  public function __construct() {
    $session = new SessionController();
    $session->logout(); 
  }
}