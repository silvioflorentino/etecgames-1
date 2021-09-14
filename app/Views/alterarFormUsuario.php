<form method="POST">
    <div class='mb-3'>
        <label class='form-label' for='codusuarioinput'>Código</label>
        <input class='form-control' type="text" name='codUsuAlterar' id='codusuarioinput' value="<?php echo($usuario -> codUsu );?>">
    </div>
    <div class='mb-3'>
        <label class='form-label'  for='email'>E-mail</label>
        <input type="text" name='emailUsu' id='email' value="<?php echo($usuario -> emailUsu );?>">
    </div>

    <div class='mb-3'>
        <button type="submit" class='btn btn-primary'>Alterar</button>
    </div>

</form>