<?php

  require_once("models/Admin.php");
  require_once("models/Message.php");

  class UsuarioDAO implements AdminDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildUser($data) {

    }
    public function create(Admin $adm, $authAdm = false) {

    }
    public function update(Admin $adm, $redirect = true) {

    }
    public function verifyToken($protected = false) {

    }
    public function setTokenToSession($token, $redirect = true) {

    }
    public function authenticateUser($email, $senha) {

    }
    public function findByEmail($email) {

    }
    public function findById($id) {

    }
    public function findByToken($token) {

    }
    public function destroyToken() {

    }
    public function changePassword(Admin $adm) {
        
    }

}