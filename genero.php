<?php
if (isset($_POST['idGenero']) && !empty($_POST['idGenero'])) {
    $iddelete = $_POST['idGenero'];
    deletecadastro('genero', "idgenero", $iddelete);

}
if (isset($_POST['idGeneroUpdate']) && !empty($_POST['idGeneroUpdate'])) {
    $idupdate = $_POST['idGeneroUpdate'];
    $nomeGeneroUpdate = $_POST['nomeGeneroUpdate'];
    alterarGlobal('genero', 'genero', "$nomeGeneroUpdate", 'idgenero', $idupdate);
}
if (isset($_POST['nomeGeneroCadastro']) && !empty($_POST['nomeGeneroCadastro'])) {
    $nomeGeneroCadastro = $_POST['nomeGeneroCadastro'];
    insertGlobal('genero', 'genero', "'$nomeGeneroCadastro'");
}
?>
<div class="container">
    <table class="table mt-5">
        <thead>
        <div class="row">
            <div class="col-6 d-flex justify-content-start mt-5">
                <h3>Tabela Gênero</h3>
            </div>
            <div class="col-6 d-flex justify-content-end mt-5">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#modalcadastro">Cadastrar
                </button>
            </div>
        </div>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Gêneros</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $generos = listarTabelaOrdenada('*', 'genero', 'genero', 'ASC');
        $contarItensLista = 1;
        foreach ($generos as $genero){
        $nomeGenero = $genero->genero;
        $idGenero = $genero->idgenero;
        ?>
        <tr class="text-center">
            <th scope="row"><?php echo $contarItensLista ?></th>
            <td><?php echo $nomeGenero ?></td>
            <td>
                <form action="#" method="post">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalupdate<?php echo $contarItensLista ?>">Alterar
                        </button>
                        <input type="text" value="<?php echo $idGenero ?>" hidden="hidden" name="idGenero">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
</div>
    </td>
    </tr>
<!-- Modal Update -->
    <div class="modal fade" id="modalupdate<?php echo $contarItensLista ?>" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Gênero</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">

                        <div class="mb-3">
                            <input type="text" value="<?php echo $idGenero ?>" hidden="hidden" name="idGeneroUpdate">
                            <label for="nomeGeneroUpdate" class="form-label">Gênero</label>
                            <input type="text" value="<?php echo $nomeGenero ?>" name="nomeGeneroUpdate"
                                   class="form-control" id="nomeGeneroUpdate">
                            <div id="emailHelp" class="form-text">Aqui você pode alterar erros ortográficos do gênero
                                acima.
                            </div>
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

<!-- Modal Update -->
<div class="modal fade" id="modalcadastro" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Gênero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

                    <div class="mb-3">
                        <label for="nomeGeneroUpdate" class="form-label">Novo Gênero</label>
                        <input type="text" name="nomeGeneroCadastro"
                               class="form-control" id="nomeGeneroCadastro">
                        <div id="emailHelp" class="form-text">Aqui você pode escrever um novo gênero de filmes
                            acima.
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Criar Gênero</button>
            </div>
            </form>
        </div>
    </div>
</div>