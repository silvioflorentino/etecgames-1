<form method="post" class='mt-5'>
    <div>
        <label for='codusu' class='form-label'>Digite o Código do usuário</label>
        <input type='number' name='codUsu' id='codusu' class='form-control' placeholder='Exemplo: 123' />
    </div>

    <div class='col-12 mt-2'>
        <button type='submit' class='btn btn-primary'>Buscar</button>
    </div>

</form>

<?php 
$codusuario = isset($usuario->codusu) ? $usuario->codusu : "";
$emailusu = isset($usuario->emailUsu) ? $usuario->emailUsu : "";
?>

<table class='table mt-5'>
    <thead>
        <th>Código</th>
        <th>Email</th>
    </thead>
    <tbody>

        <tr>
            <td> <?php echo ($codusuario) ?> </td>
            <td> <?php echo ($emailusu) ?> </td>
        </tr>

    </tbody>
</table>
