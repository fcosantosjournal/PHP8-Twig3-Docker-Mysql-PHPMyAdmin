<?php

namespace App\Controller;

class SessionController {

  public function __construct() {
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public function setLogged($user, $email): void {
    $_SESSION['user'] = $user;
    $_SESSION['email'] = $email;
    $_SESSION['logged'] = true;
  }

  public function logout(): void {
    $_SESSION['logged'] = false;
    $_SESSION['user'] = null;
    $_SESSION['email'] = null;
    header('Location: /');
  }

  public function getLogged(): bool {
    if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
      return true;
    } else {
      return false;
    }
  }
}