<?php

namespace App\Model;

use App\Db\Db;

class LoginModel {
  protected $db;
  protected $user;
  protected $email;
  protected $password;
  protected $userFromDb;

  public function __construct() {
    $this->db = new Db();
  }

  public function login($email, $password) {
    $this->email = $email;
    $this->password = md5($password);

    $this->userFromDb = $this->db->getOneBy('email', $this->email, 'users');

    if ($this->userFromDb) {
      if ($this->password == $this->userFromDb['password']) {
        return $this->userFromDb;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}