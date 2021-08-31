<table class='table'>
    <thead>
        <th>Código</th>
        <th>Usuário</th>
        <th>Email</th>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td> <?php echo ($usuario->codusu) ?> </td>
            <td> <?php echo ($usuario->emailUsu) ?> </td>
            <td> <?php echo ($usuario->SenhaUsu) ?> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>