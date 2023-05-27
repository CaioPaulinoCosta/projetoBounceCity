<?php

  class Admin {

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $image;
    public $bio;
    public $token;

    public function getFullName($adm) {
      return $adm->name . " " . $adm->lastname;
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generatePassword($password) {
      return password_hash($password, PASSWORD_DEFAULT);
    }

    public function imageGenerateName() {
      return bin2hex(random_bytes(60)) . ".jpg";
    }

  }

  interface AdminDAOInterface {

    public function buildAdmin($data);
    public function create(Admin $adm, $authAdm = false);
    public function update(Admin $adm, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateAdmin($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(Admin $adm);

  }