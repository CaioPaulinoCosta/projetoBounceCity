<?php

require_once('templates/header.php');
require_once('dao/UserDAO.php')

?>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-4 mt-5 pt-5 ps-5">
            <h3>Faça seu registro!</h3>
        </div>
        </div>
        <div class="row justify-content-center align-items-center">
        <div class="col-4 ps-5">
            <form>
            <div class="email-form mt-2 pe-5">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" for="email" name="email" id="email">
            </div>
            <div class="email-form mt-2 pe-5">
            <label class="form-label">Nome:</label>
            <input type="name" class="form-control" for="name" name="name" id="name">
            </div>
            <div class="email-form mt-2 pe-5">
            <label class="form-label">Sobrenome:</label>
            <input type="lastname" class="form-control" for="lastname" lastname="lastname" id="lastname">
            </div>
            <div class="password-form mt-3 pe-5">
            <label class="form-label">Senha:</label>
            <input type="password" class="form-control" for="password" name="password" id="password">
            </div>
            <div class="password-form mt-3 pe-5">
            <label class="form-label">Confirme sua senha:</label>
            <input type="password" class="form-control" for="confirmpassword" name="confirmpassword" id="confirmpassword">
            </div>
            <div class="d-grid gap-2 pe-5 pt-3 pb-5">
            <button class="btn btn-primary" type="button">Button</button>
            </div>

            
            </form>
        </div>
        </div>


</div>


<?php

require_once('templates/footer.php');

?>