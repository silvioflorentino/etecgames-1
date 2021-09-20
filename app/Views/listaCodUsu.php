<form method="post" class='mt-5 border border-primary rounded p-4'>
    <div>
        <label for='codusu' class='form-label'>Digite o Código do usuário</label>
        <input type='number' name='codUsu' id='codusu' class='form-control' placeholder='Exemplo: 123' />
    </div>

    <div class='col-12 mt-4'>
        <button type='submit' class='btn btn-primary'>Buscar</button>
    </div>

</form>

<?php 
$codusuario = isset($usuario->codusu) ? $usuario->codusu : "";
$emailusu = isset($usuario->emailUsu) ? $usuario->emailUsu : "";

if($codusuario) :
?>
<div class='mt-5 rounded border border-success p-4'>
<h2>Resultado:</h2>
<table class='table mt-3'>
    <thead>
        <th>Código</th>
        <th>Email</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </thead>
    <tbody>

        <tr>
            <td> <?php echo ($codusuario) ?> </td>
            <td> <?php echo ($emailusu) ?> </td>
            <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#alterarUsuModal" codigo="<?php echo ($codusuario); ?>" email='<?php echo ($emailusu) ?>'>Alterar</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletarUsuModal" codigo="<?php echo ($codusuario); ?>" email='<?php echo ($emailusu) ?>'>Deletar</button>
            </td>
        </tr>

    </tbody>
</table>
</div>
<?php endif ?>



<div class="modal fade" id="alterarUsuModal" tabindex="-1" aria-labelledby="alterarUsuModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="alterarUsuModal">Alterar Usuario</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="codUsuAlterar" class="codigo form-control" id="codusuario" readonly>
                    <input type="hidden" name="codUsu" class="codigo2 form-control" id="codusuario" readonly>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" name="emailUsu" class="email form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="col-form-label">Nova Senha:</label>
                        <input type="password" name="senhaUsu" class="form-control" id="senha" placeholder="(Deixe em branco para não alterar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deletarUsuModal" tabindex="-1" aria-labelledby="deletarUsuModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletarUsuModal">Tem certeza que quer deletar o usuario?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-footer">
                    <input type="hidden" name='codUsuDel' value="<?php echo ($codusuario); ?>">
                    <button type="submit" class="btn btn-danger">Sim</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var alterarUsuModal = document.getElementById('alterarUsuModal')
    alterarUsuModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var codigo = button.getAttribute('codigo')

        var email = button.getAttribute('email')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.

        var Codigo = alterarUsuModal.querySelector('.modal-body .codigo')
        Codigo.value = codigo

        var Codigo2 = alterarUsuModal.querySelector('.modal-body .codigo2')
        Codigo2.value = codigo

        var Email = alterarUsuModal.querySelector('.modal-body .email')
        Email.value = email
    })

    var deletarUsuModal = document.getElementById('deletarUsuModal')
    deletarUsuModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        var codigo = button.getAttribute('codigo');
        var email = button.getAttribute('email');
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.

        var modalTitle = deletarUsuModal.querySelector('.modal-title');
        modalTitle.textContent = 'Tem certeza que deseja excluir o usuario ' + email + '?';
    
        var Codigo = deletarUsuModal.querySelector('.modal-footer .codigo');
        Codigo.value = codigo;

        //var Email = alterarUsuModal.querySelector('.modal-header .email');
        //Email.value = email;
    })
</script>