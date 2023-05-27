<?php 
require_once("templates/header.php")
?>
<div class="container-fluid" style="background-color: #D5E4EC;">
<div class="container" style="padding-top: 100px;">
    <div class="col d-flex justify-content-center">
<form action="<?= $BASE_URL ?>authAdm_process.php" method="POST" class="login-form w-75">
    <input type="hidden" name="type" value="login">
    <div class="login-form-title text-center">
<h1>Bem-Vindo!</h1>
<p style="font-size: 20px;">Digite suas informações no formulário abaixo para acessar sua conta!</p>
    </div>
  <div class="mb-5">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu email...">
  </div>
  <div class="mb-5">
    <label for="password" class="form-label">Senha:</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha...">
  </div>
  <div class="d-grid gap-2" style="padding-bottom: 100px;">
  <input type="submit" class="btn btn-primary" type="button" value="Entrar"></input>
  <p class="mt-3" style="font-size: 20px;">Ainda não se registrou? <a style="text-decoration: none;" href="registerUsers.php"><span style="color: #F04E3D;">Clique aqui</span></a> aqui para se registrar agora mesmo!</p>
  </div>
</form>
</div>
</div>
</div>

<?php 
require_once("templates/footer.php")
?>