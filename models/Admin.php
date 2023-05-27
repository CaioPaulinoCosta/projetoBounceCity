<?php

class Admin {
    public $id;
    public $nome;
    public $snome;
    public $email;
    public $senha;
    public $bio;
    public $image;
    public $token;

    public function getFullName($adm) {
        return $adm->nome . " " . $adm->snome;
    }

    public function generateToken() {
        return bin2hex(random_bytes(50));
    }

    public function generatePassword($senha) {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function imageGenerateName() {
        return bin2hex(random_bytes(60)) . ".jpg";
    }

    }

    interface AdminDAOInterface {
        public function buildUser($data);
        public function create(Admin $adm, $authAdm = false);
        public function update(Admin $adm, $redirect = true);
        public function verifyToken($protected = false);
        public function setTokenToSession($token, $redirect = true);
        public function authenticateUser($email, $senha);
        public function findByEmail($email);
        public function findById($id);
        public function findByToken($token);
        public function destroyToken();
        public function changePassword(Admin $adm);
    }