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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Project CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <title>BounceCity</title>
    <link rel="short icon" href="img/icon.svg" />
    
</head>
<body>
    
<header>
  <nav class="navbar navbar-expand bg-custom">
    <div class="container-fluid">
      <a style="padding-left: 150px;" class="navbar-brand" href="#"><h1 style="color: #4E1B1C;font-weight: 700;">Bounce<span style="color: #FF8F1F;font-weight: 700;" class="logoColoredText"> City</span></h1></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="padding-right: 100px;">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>