<?php

  require_once("globals.php");
  require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--ESTILOS DO PROJETO -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Projeto Blog</title>
    <!--GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@300;700&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <div class="container-fluid">
                <div class="navbar-brand">Logo</div>

                <div class="collapse navbar-collapse">
                    <div class="collapse navbar-collapse justify-content-center" style="margin-left: 120px;">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $BASE_URL ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notícias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quadras</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="navbar-nav mx-auto">
                            <a href="#"><div class="header-profile-image" style="background-image: url('img/Users/blankProfile.jpg');"></div></a>
                            <li class="nav-item"><a class="nav-link" href="#">Entrar</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>