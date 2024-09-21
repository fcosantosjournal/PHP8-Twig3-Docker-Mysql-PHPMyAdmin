<?php

namespace App\Controller;

use App\Db\Db;

class LoginController {

  public $user;
  public $email;
  public $password;
  protected $db;
  public $data;

  public function __construct() {
    $this->db = new Db();
  }  
  public function index() {

    $this->data = $this->db->getOneBy('path', 'login', 'paginas');

    if (isset($_POST['email']) && isset($_POST['password'])) {
      
      $this->email = $_POST['email'];
      $this->password = $_POST['password'];
      
      $login = new \App\Model\LoginModel();
      $this->user = $login->login($this->email, $this->password);
      
      if ($this->user) {

        $session = new SessionController();
        $session->setLogged($this->user['name'], $this->user['email']);
        $this->data['logged'] = true;
        header('Location: /');

      } else {

        $this->data['logged'] = false;
        $this->data['path'] = 'login';
        $this->data['msg'] = 'Usuário ou senha inválidos.';

      }

    } else {

      $this->data['logged'] = false;
      $this->data['path'] = 'login';  
      $this->data['msg'] = 'Entre com seu usuário e senha.';

    }
    return $this->data;
  }
}