<?php

namespace App\Model;

use App\Db\Db;

class RegisterModel {
  protected $db;
  protected $user;
  protected $email;
  protected $password;
  protected $name;
  protected $userFromDb;
  public $data;

  public function __construct() {
    $this->db = new Db();
  }

  public function register($email, $password, $name) {
    $this->email = $email;
    $this->password = md5($password);
    $this->name = $name;

    $fields = "email, password, name";
    $values = "'" .$this->email ."', '" . $this->password . "', '" . $this->name . "'";

    $this->user = $this->db->insert("$fields", "$values", 'users');

    if ($this->user) {
      return true;
    } 
    return false;
  }
}