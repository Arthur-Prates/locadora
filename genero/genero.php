<div class="container">
    <table class="table mt-5">
        <thead>
        <div class="row">
            <div class="col-6 d-flex justify-content-start mt-5">
                <h3>Tabela Gênero</h3>
            </div>
            <div class="col-6 d-flex justify-content-end mt-5">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        onclick="abrirModalJs(false,false,'modalcadastroGenero','A','btnAddGenero','generoAdd','nomeGeneroCadastro','frmAddGenero')">
                    Cadastrar
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
        foreach ($generos as $genero) {
            $nomeGenero = $genero->genero;
            $idGenero = $genero->idgenero;
            $nomeGenero = ucfirst_tr($nomeGenero);

            ?>
            <tr class="text-center">
                <th scope="row"><?php echo $contarItensLista ?></th>
                <td><?php echo $nomeGenero ?></td>
                <td>
                    <form action="#" method="post">

                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    onclick="abrirModalJs('<?php echo $idGenero; ?>','idGeneroEdit','modalEditGenero','A','btnEditGenero','generoEdit','nomeGeneroEdit','frmEditGenero')">
                                Alterar
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    onclick="abrirModalJs('<?php echo $idGenero; ?>','idGeneroDelete','modalDeleteGenero','A','btnDeleteGenero','generoDelete','nomeGeneroDelete','frmDeleteGenero')">
                                Deletar
                            </button>
                    </form>
                </td>
            </tr>

            <?php
            ++$contarItensLista;
        }
        ?>
        </tbody>
    </table>
</div>
