<?php
//if (isset($_POST['idFilme']) && !empty($_POST['idFilme'])) {
//    $iddelete = $_POST['idFilme'];
//    deletecadastro('filme', "idfilme", $iddelete);
//}
//if (isset($_POST['idFilmeUpdate']) && !empty($_POST['idFilmeUpdate'])) {
//    $idupdate = $_POST['idFilmeUpdate'];
//    $nomeFilmeUpdate = $_POST['nomeFilmeUpdate'];
//    $anoFilmeUpdate = $_POST['anoFilmeUpdate'];
//    $valorFilmeUpdate = $_POST['valorFilmeUpdate'];
//    $generoFilmeUpdate = $_POST['generoFilmeUpdate'];
//
//    alterarGlobal('filme', 'nomeFilme', "$nomeFilmeUpdate", 'idfilme', $idupdate);
//    alterarGlobal('filme', 'ano', "$anoFilmeUpdate", 'idfilme', $idupdate);
//    alterarGlobal('filme', 'valor', "$valorFilmeUpdate", 'idfilme', $idupdate);
//    alterarGlobal('filme', 'idgenero', "$generoFilmeUpdate", 'idfilme', $idupdate);
//
//}
//if (isset($_POST['nomeFilmeCadastro']) && !empty($_POST['nomeFilmeCadastro'])) {
//    $nomeFilmeCadastro = $_POST['nomeFilmeCadastro'];
//    $anoFilmeCadastro = $_POST['anoFilmeCadastro'];
//    $valorFilmeCadastro = $_POST['valorFilmeCadastro'];
//    $generoFilmeCadastro = $_POST['generoFilmeCadastro'];
//    insertGlobal('filme', 'idgenero,nomeFilme,ano,valor', "'$generoFilmeCadastro','$nomeFilmeCadastro','$anoFilmeCadastro','$valorFilmeCadastro'");
//}
//?>
<div class="container">
    <table class="table mt-5">
        <thead>
        <div class="row">
            <div class="col-6 d-flex justify-content-start mt-5">
                <h3>Tabela Filmes</h3>
            </div>
            <div class="col-6 d-flex justify-content-end mt-5">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#modalcadastroFilme">Cadastrar
                </button>
            </div>
        </div>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Gênero</th>
            <th scope="col">Nome</th>
            <th scope="col">Lançado</th>
            <th scope="col">Valor</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $filmes = listarTabelaInnerJoin('*', 'filme', 'genero', 'idgenero', 'idgenero', 'nomefilme', 'ASC');
        $contarItensLista = 1;
        foreach ($filmes as $filme) {
            $idFilme = $filme->idfilme;
            $idgenero = $filme->genero;
            $nomeFilme = $filme->nomeFilme;
            $anoFilme = $filme->ano;
            $valorFilme = $filme->valor;
            $valorinput = conversorDBNumPonto($valorFilme);
            $valorFilme = conversorDBNum($valorFilme);
            ?>
            <tr class="text-center">
                <th scope="row"><?php echo $contarItensLista ?></th>
                <td><?php echo $idgenero ?></td>
                <td><?php echo $nomeFilme ?></td>
                <td><?php echo $anoFilme ?></td>
                <td><?php echo $valorFilme ?></td>
                <td>
                    <form action="#" method="post">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modalvermais<?php echo $contarItensLista ?>">Ver Mais
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalupdate<?php echo $contarItensLista ?>">Alterar
                            </button>
                            <input type="text" value="<?php echo $idFilme ?>" hidden="hidden" name="idFilme">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>

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
                        <form action="#" method="post">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="text-center">Nome:</h4>
                                            <?php echo "<p class='text-center'>$nomeFilme</p>" ?>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="text-center">Lançado em:</h4>
                                            <?php echo "<p class='text-center'>$anoFilme</p>" ?>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="text-center">Gênero</h4>
                                            <?php echo "<p class='text-center'>$idgenero</p>" ?>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="text-center">Valor:</h4>
                                            <?php echo "<p class='text-center'>$valorFilme</p>" ?>
                                        </div>

                                    </div>


                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar
                                </button>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Filme</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post">
                            <div class="modal-body">

                                <input type="text" value="<?php echo $idFilme ?>" hidden="hidden" name="idFilmeUpdate">
                                <div class="mb-3">
                                    <label for="nomeFilmeUpdate" class="form-label">Nome:</label>
                                    <input type="text" value="<?php echo $nomeFilme ?>" name="nomeFilmeUpdate"
                                           class="form-control" id="nomeFilmeUpdate">
                                </div>
                                <label for="generoFilmeUpdate" class="form-label">Gênero:</label>
                                <select class="form-select" aria-label="Default select example" name="generoFilmeUpdate"
                                        id="generoFilmeUpdate">
                                    <?php

                                    $ids = listarTabelaOrdenada("*", 'genero', 'genero', 'ASC');
                                    foreach ($ids as $id) {

                                        $idgeneross = $id->genero;
                                        $idgeneroNumero = $id->idgenero;
                                        ?>
                                        <option <?php if ($idgeneross === $idgenero) {
                                            echo 'selected';
                                        } ?> value="<?php echo $idgeneroNumero ?>"><?php echo $idgeneross ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                                <div class="mb-3">
                                    <label for="anoFilmeUpdate" class="form-label">Data de Lançamento:</label>
                                    <input type="text" minlength="4" maxlength="4" value="<?php echo $anoFilme ?>"
                                           name="anoFilmeUpdate"
                                           class="form-control" id="anoFilmeUpdate">
                                </div>
                                <div class="mb-3">
                                    <label for="valorFilmeUpdate" class="form-label">Valor:</label>
                                    <input type="number" step="0.010" value="<?php echo $valorinput ?>"
                                           name="valorFilmeUpdate"
                                           class="form-control" id="valorFilmeUpdate">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar
                                </button>
                                <button type="submit" class="btn btn-primary">Salvar Modificações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            ++$contarItensLista;
        }
        ?>
        </tbody>
    </table>
</div>
