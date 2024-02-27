<?php
if (isset($_POST['idCliente']) && !empty($_POST['idCliente'])) {
    $iddelete = $_POST['idCliente'];
    deletecadastro('cliente', "idcliente", $iddelete);

}
if (isset($_POST['idClienteUpdate']) && !empty($_POST['idClienteUpdate'])) {
    $idupdate = $_POST['idClienteUpdate'];
    $nomeupdate = $_POST['nomeClienteUpdate'];
    $nascimentoupdate = $_POST['nascimentoClienteUpdate'];
    $telefoneupdate = $_POST['telefoneClienteUpdate'];
    $emailupdate = $_POST['emailClienteUpdate'];
    $senhaupdate = $_POST['senhaClienteUpdate'];
    $cpfupdate = $_POST['cpfClienteUpdate'];


    alterarGlobal('cliente', 'nome', "$nomeupdate", 'idcliente', $idupdate);
    alterarGlobal('cliente', 'nascimento', "$nascimentoupdate", 'idcliente', $idupdate);
    alterarGlobal('cliente', 'telefone', "$telefoneupdate", 'idcliente', $idupdate);
    alterarGlobal('cliente', 'email', "$emailupdate", 'idcliente', $idupdate);
    alterarGlobal('cliente', 'senha', "$senhaupdate", 'idcliente', $idupdate);
    alterarGlobal('cliente', 'cpf', "$cpfupdate", 'idcliente', $idupdate);
}
if (isset($_POST['nomeClienteCadastro']) && !empty($_POST['nomeClienteCadastro'])) {

    $nomeClienteCadastro = $_POST['nomeClienteCadastro'];
    $nascimentoClienteCadastro = $_POST['nascimentoClienteCadastro'];
    $telefoneClienteCadastro = $_POST['telefoneClienteCadastro'];
    $emailClienteCadastro = $_POST['emailClienteCadastro'];
    $senhaClienteCadastro = $_POST['senhaClienteCadastro'];
    $cpfClienteCadastro = $_POST['cpfClienteCadastro'];

    insertGlobal('cliente', 'nome, nascimento, telefone, email, senha, cpf', "$nomeClienteCadastro','$nascimentoClienteCadastro','$telefoneClienteCadastro','$emailClienteCadastro','$senhaClienteCadastro','$cpfClienteCadastro'");
}
?>
<div class="container">
    <table class="table mt-5 fixed">
        <thead>
        <div class="row">
            <div class="col-6 d-flex justify-content-start mt-5">
                <h3>Tabela Usuários</h3>
            </div>
            <div class="col-6 d-flex justify-content-end mt-5">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#modalcadastroCliente">Cadastrar
                </button>
            </div>
        </div>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $clientes = listarTabelaOrdenada('*', 'cliente', 'nome', 'ASC');
        $contarItensLista = 1;
        foreach ($clientes

        as $cliente){
        $idCliente = $cliente->idcliente;
        $nomeCliente = $cliente->nome;
        $nascimentoCliente = $cliente->nascimento;
        $telefoneCliente = $cliente->telefone;
        $emailCliente = $cliente->email;
        $senhaCliente = $cliente->senha;
        $cpfCliente = $cliente->cpf;
        ?>
        <tr class="text-center">
            <th scope="row"><?php echo $contarItensLista ?></th>
            <td><?php echo $nomeCliente ?></td>
            <td><?php echo $nascimentoCliente ?></td>
            <td><?php echo $telefoneCliente ?></td>
            <td>
                <form action="#" method="post">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalvermais<?php echo $contarItensLista ?>">Ver Mais
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalupdate<?php echo $contarItensLista ?>">Alterar
                        </button>
                        <input type="text" value="<?php echo $idCliente ?>" hidden="hidden" name="idCliente">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
</div>
    </td>
    </tr>
<!-- Modal Ver Mais -->
    <div class="modal fade" id="modalvermais<?php echo $contarItensLista ?>" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Mais</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">

                        <div class="mb-3">
                            <div class="row">


                                <div class="col-6">
                                    <h4 class="text-center">Nome</h4>
                                    <?php echo "<p class='text-center'>$nomeCliente</p>" ?>
                                </div>
                                <div class="col-6">
                                    <h4 class="text-center">Aniversário</h4>
                                    <?php echo "<p class='text-center'>$nascimentoCliente</p>" ?>
                                </div>
                                <div class="col-6">
                                    <h4 class="text-center">Cpf</h4>
                                    <?php echo "<p class='text-center'>$cpfCliente</p>" ?>
                                </div>
                                <div class="col-6">
                                    <h4 class="text-center">Telefone</h4>
                                    <?php echo "<p class='text-center'>$telefoneCliente</p>" ?>
                                </div>
                                <div class="col-12">
                                    <h4 class="text-center">Email</h4>
                                    <?php echo "<p class='text-center'>$emailCliente</p>" ?>
                                </div>

                                <div class="col-12">
                                    <h4 class="text-center">Senha</h4>
                                    <?php echo "<p class='text-center'>$senhaCliente</p>" ?>
                                </div>

                            </div>


                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal Update -->
    <div class="modal fade" id="modalupdate<?php echo $contarItensLista ?>" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">

                        <div class="mb-3">


                            <label for="nomeClienteUpdate" class="form-label">Nome:</label>
                            <input type="text" value="<?php echo $nomeCliente ?>" name="nomeClienteUpdate"
                                   class="form-control mb-3" id="nomeClienteUpdate">
                            <label for="nascimentoClienteUpdate" class="form-label">Data de Nascimento:</label>
                            <input type="date" value="<?php echo $nascimentoCliente ?>" name="nascimentoClienteUpdate"
                                   class="form-control mb-3" id="nascimentoClienteUpdate">
                            <label for="telefoneClienteUpdate" class="form-label">Telefone:</label>
                            <input type="text" maxlength="13" value="<?php echo $telefoneCliente ?>"
                                   name="telefoneClienteUpdate"
                                   class="form-control mb-3" id="telefoneClienteUpdate">
                            <label for="cpfClienteUpdate" class="form-label">CPF:</label>
                            <input type="text" maxlength="14" value="<?php echo $cpfCliente ?>" name="cpfClienteUpdate"
                                   class="form-control mb-3 cpfClienteCadastro" id="cpfClienteUpdate">
                            <label for="emailClienteUpdate" class="form-label">Email:</label>
                            <input type="email" value="<?php echo $emailCliente ?>" name="emailClienteUpdate"
                                   class="form-control mb-3" id="emailClienteUpdate">
                            <label for="senhaClienteUpdate" class="form-label">Senha:</label>
                            <input type="text" value="<?php echo $senhaCliente ?>" name="senhaClienteUpdate"
                                   class="form-control mb-3" id="senhaClienteUpdate">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Modificações</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
$contarItensLista = $contarItensLista + 1;
}
?>
</tbody>
</table>
</div>


