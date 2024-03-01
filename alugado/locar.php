<?php
//if (isset($_POST['idLocar']) && !empty($_POST['idLocar'])) {
//    $iddelete = $_POST['idLocar'];
//    deletecadastro('locar', "idlocar", $iddelete);
//
//}
//if (isset($_POST['idLocarUpdate']) && !empty($_POST['idLocarUpdate'])) {
//    $idupdate = $_POST['idLocarUpdate'];
//    $filmeLocarUpdate = $_POST['filmeLocarUpdate'];
//    $clienteLocarUpdate = $_POST['clienteLocarUpdate'];
//
//    alterarGlobal('locar', 'idcliente', "$clienteLocarUpdate", 'idlocar', $idupdate);
//    alterarGlobal('locar', 'idfilme', "$filmeLocarUpdate", 'idlocar', $idupdate);
//}
//if (isset($_POST['clienteLocarCadastro']) && !empty($_POST['clienteLocarCadastro'])) {
//    $clienteLocarCadastro = $_POST['clienteLocarCadastro'];
//    $filmeLocarCadastro = $_POST['filmeLocarCadastro'];
//    insertGlobal('locar', 'idcliente,idfilme', "'$clienteLocarCadastro','$filmeLocarCadastro'");
//}
//?>
<div class="container">
    <table class="table mt-5">
        <thead>
        <div class="row">
            <div class="col-6 d-flex justify-content-start mt-5">
                <h3>Tabela Aluguéis</h3>
            </div>
            <div class="col-6 d-flex justify-content-end mt-5">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#modalcadastroAlugar">Cadastrar
                </button>
            </div>
        </div>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Filme</th>
            <th scope="col">Ação</th>


        </tr>
        </thead>
        <tbody>

        <?php

        $locars = listarTabelaInnerJoinTriplo('*', 'locar', 'cliente', 'filme', 'idcliente', 'idcliente', 'idfilme', 'idfilme', 'idlocar', 'ASC');
        $contarItensLista = 1;
        foreach ($locars as $locar) {
            $idLocar = $locar->idlocar;
            $nomeclienteLocar = $locar->nome;
            $nomefilmeLocar = $locar->nomeFilme;
            $dataaluguelLocar = $locar->dataAlugada;
            ?>
            <tr class="text-center">
                <th scope="row"><?php echo $contarItensLista ?></th>
                <td><?php echo $nomeclienteLocar ?></td>
                <td><?php echo $nomefilmeLocar ?></td>
                <td>
                    <form action="#" method="post">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modalvermais<?php echo $contarItensLista ?>">Ver Mais
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalupdate<?php echo $contarItensLista ?>">Alterar
                            </button>
                            <input type="text" value="<?php echo $idLocar ?>" hidden="hidden" name="idLocar">
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

                                        <div class="col-12">
                                            <h4 class="text-center">Cliente</h4>
                                            <?php echo "<p class='text-center'>$nomeclienteLocar</p>" ?>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-center">Filme Alugado</h4>
                                            <?php echo "<p class='text-center'>$nomefilmeLocar</p>" ?>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-center">Data de Aluguel</h4>
                                            <?php echo "<p class='text-center'>$dataaluguelLocar</p>" ?>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <input type="text" value="<?php echo $idLocar ?>" hidden="hidden"
                                           name="idLocarUpdate">
                                    <label for="clienteLocarUpdate" class="form-label">Cliente:</label>
                                    <select class="form-select form-select-md mb-3" aria-label="Large select example"
                                            name="clienteLocarUpdate" id="clienteLocarUpdate">
                                        <?php

                                        $cl = listarTabelaOrdenada('idcliente,nome', 'cliente', 'nome', 'ASC');
                                        foreach ($cl as $clientess) {
                                            $nomeCl = $clientess->nome;
                                            $idCl = $clientess->idcliente;
                                            if ($nomeCl === $nomeclienteLocar) {
                                                ?>
                                                <option selected
                                                        value="<?php echo $idCl ?>"><?php echo $nomeCl ?></option>
                                                <?php
                                            } else {


                                                ?>
                                                <option value="<?php echo $idCl ?>"><?php echo $nomeCl ?></option>
                                                <?php
                                            }
                                        }
                                        ?>


                                    </select>
                                    <label for="filmeLocarUpdate" class="form-label">Filme Alugado:</label>
                                    <select class="form-select form-select-md mb-3" aria-label="Large select example"
                                            name="filmeLocarUpdate" id="filmeLocarUpdate">
                                        <?php

                                        $film = listarTabelaOrdenada('idfilme,nomeFilme', 'filme', 'nomeFilme', 'ASC');
                                        foreach ($film as $films) {
                                            $nomeFilm = $films->nomeFilme;
                                            $idFilm = $films->idfilme;
                                            if ($nomeFilm === $nomefilmeLocar) {
                                                ?>
                                                <option selected
                                                        value="<?php echo $idFilm ?>"><?php echo $nomeFilm ?></option>
                                                <?php
                                            } else {

                                                ?>
                                                <option value="<?php echo $idFilm ?>"><?php echo $nomeFilm ?></option>
                                                <?php

                                            }
                                        }
                                        ?>


                                    </select>
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



