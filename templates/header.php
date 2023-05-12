<?php
  require_once("globals.php");
  require_once("db.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();

if(!empty($flassMessage["msg"])) {
  // Limpar a mensagem
  $message->clearMessage();
}

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(false);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basketnow</title>
    <link rel="short icon" href="img/basketnow.ico" />
    <!--####################################-->
    <!--              Bootstrap             -->
    <!--####################################-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.css"
        integrity="sha512-h1rwF0uB6r2IuEZcyjPrR53bBKN9Wb4yL+w3Rdlzmc3CkBF1gMSFvQIIstnu4bEtYDaKca5ke5S8UBAACRImyg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--########################################-->
    <!--             Font Awesome               -->
    <!--########################################-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--########################################-->
    <!--                  CSS                   -->
    <!--########################################-->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
</head>

<body>
    <!--########################################-->
    <!--                  MENU                  -->
    <!--########################################-->
    <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="<?= $BASE_URL ?>" class="navbar-brand">
            <img src="<?= $BASE_URL ?>img/logo.svg" alt="MovieStar" id="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <?php if($userData): ?>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>jogos.php" class="nav-link">Jogos</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>noticias.php" class="nav-link">Noticias</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>quadras.php" class="nav-link">Quadras</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bold" href="<?= $BASE_URL ?>editprofile.php"><?= $userData->name ?></a>
                </li>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>logout.php" class="nav-link">Sair</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>auth.php" class="nav-link">Entrar / Cadastrar</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    </header>
    <!--########################################-->
    <!--        Mensagem de ERROR/SUCESS        -->
    <!--########################################-->
    <?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
        <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
    <?php endif; ?>