<?php

class Usuario {

    public $id;
    public $nome;
    public $snome;
    public $email;
    public $senha;
    public $bio;
    public $image;
    public $token;

    public function getFullName($user) {
        return $user->nome . " " . $user->snome;
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

    interface UsuarioDAOInterface {
        public function buildUser($data);
        public function create(Usuario $user, $authUser = false);
        public function update(Usuario $user, $redirect = true);
        public function verifyToken($protected = false);
        public function setTokenToSession($token, $redirect = true);
        public function authenticateUser($email, $senha);
        public function findByEmail($email);
        public function findById($id);
        public function findByToken($token);
        public function destroyToken();
        public function changePassword(Usuario $user);
    }