<?php

  require_once("models/Admin.php");
  require_once("models/Message.php");

  class AdminDAO implements AdminDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildAdmin($data) {

      $adm = new Admin();

      $adm->id = $data["id"];
      $adm->name = $data["name"];
      $adm->lastname = $data["lastname"];
      $adm->email = $data["email"];
      $adm->password = $data["password"];
      $adm->image = $data["image"];
      $adm->bio = $data["bio"];
      $adm->token = $data["token"];

      return $adm;

    }

    public function create(Admin $adm, $authAdm = false) {

      $stmt = $this->conn->prepare("INSERT INTO admins(
          name, lastname, email, password, token
        ) VALUES (
          :name, :lastname, :email, :password, :token
        )");

      $stmt->bindParam(":name", $adm->name);
      $stmt->bindParam(":lastname", $adm->lastname);
      $stmt->bindParam(":email", $adm->email);
      $stmt->bindParam(":password", $adm->password);
      $stmt->bindParam(":token", $adm->token);

      $stmt->execute();

      // Autenticar usuário, caso auth seja true
      if($authAdm) {
        $this->setTokenToSession($adm->token);
      }

    }

    public function update(Admin $adm, $redirect = true) {
      $stmt = $this->conn->prepare("UPDATE admins SET
        name = :name,
        lastname = :lastname,
        email = :email,
        image = :image,
        bio = :bio,
        token = :token
        WHERE id = :id
      ");

      $stmt->bindParam(":name", $adm->name);
      $stmt->bindParam(":lastname", $adm->lastname);
      $stmt->bindParam(":email", $adm->email);
      $stmt->bindParam(":image", $adm->image);
      $stmt->bindParam(":bio", $adm->bio);
      $stmt->bindParam(":token", $adm->token);
      $stmt->bindParam(":id", $adm->id);

      $stmt->execute();

      if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Dados atualizados com sucesso!", "success", "editProfileAdm.php");

      }

    }

    public function verifyToken($protected = false) {

      if(!empty($_SESSION["token"])) {

        // Pega o token da session
        $token = $_SESSION["token"];

        $adm = $this->findByToken($token);

        if($adm) {
          return $adm;
        } else if($protected) {

          // Redireciona usuário não autenticado
          $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");

        }

      } else if($protected) {

        // Redireciona usuário não autenticado
        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");

      }

    }

    public function setTokenToSession($token, $redirect = true) {

      // Salvar token na session
      $_SESSION["token"] = $token;

      if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Seja bem-vindo!", "success", "editProfileAdm.php");

      }

    }

    public function authenticateAdmin($email, $password) {

        $adm = $this->findByEmail($email);

      if($adm) {

        // Checar se as senhas batem
        if(password_verify($password, $adm->password)) {

          // Gerar um token e inserir na session
          $token = $adm->generateToken();

          $this->setTokenToSession($token, false);

          // Atualizar token no usuário
          $adm->token = $token;

          $this->update($adm, false);

          return true;

        } else {
          return false;
        }

      } else {

        return false;

      }

    }

    public function findByEmail($email) {

      if($email != "") {

        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE email = :email");

        $stmt->bindParam(":email", $email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $adm = $this->buildAdmin($data);
          
          return $adm;

        } else {
          return false;
        }

      } else {
        return false;
      }

    }

    public function findById($id) {

      if($id != "") {

        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $adm = $this->buildAdmin($data);
          
          return $adm;

        } else {
          return false;
        }

      } else {
        return false;
      }
    }

    public function findByToken($token) {

      if($token != "") {

        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE token = :token");

        $stmt->bindParam(":token", $token);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $adm = $this->buildAdmin($data);
          
          return $adm;

        } else {
          return false;
        }

      } else {
        return false;
      }

    }

    public function destroyToken() {

      // Remove o token da session
      $_SESSION["token"] = "";

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Você fez o logout com sucesso!", "success", "index.php");

    }

    public function changePassword(Admin $adm) {

      $stmt = $this->conn->prepare("UPDATE admins SET
        password = :password
        WHERE id = :id
      ");

      $stmt->bindParam(":password", $adm->password);
      $stmt->bindParam(":id", $adm->id);

      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Senha alterada com sucesso!", "success", "editProfileAdm.php");

    }

  }