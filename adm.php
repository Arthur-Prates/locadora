<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>ADM</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>

</head>

<body>
<?php
include_once('./navAdm.php');
?>


<div class="row d-flex">
    <div class="col-0 col-lg-2 bg-black text-center text-white" id='navLateral'>
        <?php
        include_once('navlateral.php');
        ?>
    </div>
    <div class="col-12 col-md-12 col-lg-10">
        <div class="container" id="show">
            <h1 class="text-center">BEM VINDO AO ADM</h1>

            <?php
            //            if (isset($_SESSION['idadm']) && !empty($_SESSION['idadm'])) {
            //                if (isset($_GET['page']) && !empty($_GET['page'])) {
            //                    $page = $_GET['page'];
            //
            //                    if ($page === 'genero') {
            //                        include_once('./genero.php');
            //                    } else if ($page === 'cliente') {
            //                        include_once('./cliente.php');
            //                    } else if ($page === 'filme') {
            //                        include_once('./filme.php');
            //                    } else if ($page === 'locado') {
            //                        include_once('./locar.php');
            //                    } else {
            //                        echo '<h1>ERROR 404</h1>';
            //                    }
            //                } else {
            //                    echo '<h1 class="text-center">BEM VINDO AO ADM</h1>';
            //                }
            //            } else {
            //                session_destroy();
            //                header('location:index.php?error=404');
            //                die();
            //            }
            ?>
        </div>

    </div>
</div>
<!-- Modal Cadastro Aluguel -->
<div class="modal fade" id="modalcadastroAlugar" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

                    <div class="mb-3">
                        <label for="clienteLocarCadastro" class="form-label">Cliente:</label>
                        <select class="form-select form-select-md mb-3" aria-label="Large select example"
                                name="clienteLocarCadastro" id="clienteLocarCadastro">
                            <?php

                            $cl = listarTabelaOrdenada('idcliente,nome', 'cliente', 'nome', 'ASC');
                            foreach ($cl as $clientes) {
                                $nomeCl = $clientes->nome;
                                $idCl = $clientes->idcliente;
                                ?>
                                <option value="<?php echo $idCl ?>"><?php echo $nomeCl ?></option>
                                <?php

                            }
                            ?>


                        </select>
                        <label for="filmeLocarCadastro" class="form-label">Filme Alugado:</label>
                        <select class="form-select form-select-md mb-3" aria-label="Large select example"
                                name="filmeLocarCadastro" id="filmeLocarCadastro">
                            <?php

                            $film = listarTabelaOrdenada('idfilme,nomeFilme', 'filme', 'nomeFilme', 'ASC');
                            foreach ($film as $film) {
                                $nomeFilm = $film->nomeFilme;
                                $idFilm = $film->idfilme;
                                ?>
                                <option value="<?php echo $idFilm ?>"><?php echo $nomeFilm ?></option>
                                <?php

                            }
                            ?>


                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Cadastrar Aluguel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Cadastro Cliente -->
<div class="modal fade" id="modalcadastroCliente" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">


                    <div class="mb-3">
                        <label for="nomeClienteUpdate" class="form-label">Nome:</label>
                        <input type="text" name="nomeClienteCadastro"
                               class="form-control" id="nomeClienteCadastro" placeholder="Digite o Nome do Cliente">
                    </div>
                    <label for="nascimentoClienteCadastro" class="form-label">Data de Nascimento:</label>
                    <input type="date" name="nascimentoClienteCadastro"
                           class="form-control mb-3" id="nascimentoClienteCadastro"
                           placeholder="Digite a Data de Nascimento">
                    <label for="telefoneClienteCadastro" class="form-label">Telefone:</label>
                    <input type="text" maxlength="13"
                           name="telefoneClienteCadastro"
                           class="form-control mb-3" id="telefoneClienteCadastro" placeholder="Digite o Telefone">
                    <label for="cpfClienteCadastro" class="form-label">CPF:</label>
                    <input type="text" maxlength="14" name="cpfClienteCadastro"
                           class="form-control mb-3 cpfClienteCadastro" id="cpfClienteCadastro cpf"
                           placeholder="Digite o CPF">
                    <label for="emailClienteCadastro" class="form-label">Email:</label>
                    <input type="email" name="emailClienteCadastro"
                           class="form-control mb-3" id="emailClienteCadastro" placeholder="Digite o Email">
                    <label for="senhaClienteCadastro" class="form-label">Senha:</label>
                    <input type="text" name="senhaClienteCadastro"
                           class="form-control mb-3" id="senhaClienteCadastro" placeholder="Digite uma Senha">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Criar Usuário</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Cadastro Genero -->
<div class="modal fade" id="modalcadastroGenero" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Gênero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" name="frmAddGenero" id="frmAddGenero">

                    <div class="mb-3">
                        <label for="nomeGeneroCadastro" class="form-label">Novo Gênero</label>
                        <input type="text" name="nomeGeneroCadastro"
                               class="form-control" id="nomeGeneroCadastro" placeholder="Digite o novo Genero">
                        <div id="GeneroHelp" class="form-text">Aqui você pode escrever um novo gênero de filmes
                            acima.
                        </div>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show " role="alert" id="AlertaCadastro" name="AlertaCadastro" style="display:none">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" id="btnAddGenero" class="btn btn-success">Criar Gênero</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Cadastro Filme -->
<div class="modal fade" id="modalcadastroFilme" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Filme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

                    <div class="mb-3">
                        <label for="nomeFilmeCadastro" class="form-label">Nome:</label>
                        <input type="text" name="nomeFilmeCadastro"
                               class="form-control" id="nomeFilmeCadastro" placeholder="Digite seu Nome">
                    </div>
                    <label for="generoFilmeCadastro" class="form-label">Gênero:</label>
                    <select class="form-select" aria-label="Default select example" name="generoFilmeCadastro"
                            id="generoFilmeCadastro">
                        <?php

                        $ids = listarTabelaOrdenada("*", 'genero', 'genero', 'ASC');
                        foreach ($ids as $id) {

                            $idgeneross = $id->genero;
                            $idgeneroNumero = $id->idgenero;
                            ?>
                            <option value="<?php echo $idgeneroNumero ?>"><?php echo $idgeneross ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <div class="mb-3">
                        <label for="anoFilmeCadastro" class="form-label">Data de Lançamento:</label>
                        <input type="text" minlength="4" maxlength="4"
                               name="anoFilmeCadastro"
                               class="form-control" id="anoFilmeCadastro" placeholder="Digite a Data de Lançamento"
                    </div>
                    <div class="mb-3">
                        <label for="valorFilmeCadastro" class="form-label">Valor:</label>
                        <input type="number" step="0.010" name="valorFilmeCadastro"
                               class="form-control" id="valorFilmeCadastro" placeholder="Digite o Valor">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Cadastrar Filme</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="./js/script.js"></script>
<script src="./js/alterDB.js"></script>
<script src="./js/controle.js"></script>
</body>

</html>