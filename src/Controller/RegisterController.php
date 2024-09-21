<?php

namespace App\Controller;

use App\Db\Db;
use App\Model\RegisterModel;

class RegisterController {

  public $user;
  public $email;
  public $password;
  public $name;
  protected $db;
  public $data;
  public $register;

  public function __construct() {
    $this->db = new Db();
  }  
  public function index() {

    $this->data = $this->db->getOneBy('path', 'register', 'paginas');

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
      
      $this->email = $_POST['email'];
      $this->password = $_POST['password'];
      $this->name = $_POST['name'];	
      
      $register = new RegisterModel();
      $this->user = $register->register($this->email, $this->password, $this->name);
      
      if ($this->user) {
        header('Location: /login');
      } else {
        $this->data['logged'] = false;
        $this->data['path'] = 'register';
        $this->data['msg'] = 'Por favor tente novamente.';
      }

    } else {
      $this->data['logged'] = false;
      $this->data['path'] = 'register';  
      $this->data['msg'] = 'Entre com seu usuário e senha.';
    }
    return $this->data;
  }
}