<?php 
require_once("templates/header.php")
?>
<div class="container-fluid" style="background-color: #D5E4EC;">
<div class="container" style="padding-top: 100px;">
    <div class="col d-flex justify-content-center">
<form action="<?= $BASE_URL ?>auth_process.php" method="POST" class="register-form w-75">
    <input type="hidden" name="type" value="register">
    <div class="register-form-title text-center">
<h1>Bem-Vindo!</h1>
<p style="font-size: 20px;">Digite suas informações no formulário abaixo para acessar sua conta!</p>
    </div>
  <div class="mb-5">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu email...">
    <div id="emailHelp" class="form-text">Nós nunca vamos compartilhar sua senha: seu segredo está seguro conosco!</div>
  </div>
  <div class="mb-5">
    <label for="name" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Digite seu nome...">
  </div>
  <div class="mb-5">
    <label for="lastname" class="form-label">Sobrenome:</label>
    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="emailHelp" placeholder="Digite seu sobrenome...">
  </div>
  <div class="mb-5">
    <label for="password" class="form-label">Senha:</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha...">
  </div>
  <div class="mb-5">
    <label for="confirmpassword" class="form-label">Confirme sua senha:</label>
    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirme sua senha...">
  </div>
  <div class="d-grid gap-2" style="padding-bottom: 100px;">
  <button class="btn btn-primary" type="button" value="Registrar">Cadastrar</button>
  </div>
</form>
</div>
</div>
</div>

<?php 
require_once("templates/footer.php")
?>