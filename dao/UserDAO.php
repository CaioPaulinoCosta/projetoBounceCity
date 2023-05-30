<?php

    require_once('models/User.php');



    class UserDAO implements UserDAOInterface {

        private $conn;
        private $url;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
        }

        public function buildUser($data) {

        $user = new User();

        $user->id = $data["id"];
        $user->name = $data["name"];
        $user->lastname = $data["lastname"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->bio = $data["bio"];
        $user->image = $data["image"];
        $user->token = $data["token"];

        return $user;

        }
        
        public function create(User $user, $authUser = false) {

            $stmt = $this->conn->prepare("INSERT INTO users (
            name, lastname, email, password, bio, image, token) VALUES (
            :name, :lastname, :email, :password, :bio, :image :token);");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":lastname", $user->lastname);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":password", $user->password);
            $stmt->bindParam(":bio", $user->bio);
            $stmt->bindParam(":image", $user->image);
            $stmt->bindParam(":token", $user->token);

            $stmt->execute();

            if ($authUser) {
                $this->setTokenToSession($user->token);
            }
        }

        public function update(User $user, $redirect = true) {

        }
        public function verifyToken($protected = false) {

        }
        public function setTokenToSession($token, $redirect = true) {

            $_SESSION["token"] = $token;

            if($redirect) {

                //colocar mensagem de sucesso! $this->message->setMessage("Seja bem-vindo!", "success", "editprofile.php");

            }

        }
        public function authenticateUser($email, $password) {

        }
        public function findByEmail($email) {

        }
        public function findById($id) {

        }
        public function findByToken($token) {

        }
        public function destroyToken() {

        }
        public function changePassword(User $user) {

        }
    
    }
