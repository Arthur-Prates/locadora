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
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">

</head>

<body>
<?php
include_once('./navbar/navAdm.php');
?>

<div class="row d-flex">
    <div class="col-0 col-lg-2 bg-black text-center text-white" id='navLateral'>
        <?php
        include_once('./navbar/navlateral.php');
        ?>
    </div>
    <div class="col-12 col-md-12 col-lg-10">

        <div class="container" id="show">
            <h1 class="text-center">BEM VINDO AO ADM</h1>

        </div>

    </div>
</div>
<!-- Modal Cadastro Genero -->
<div class="modal fade" id="modalcadastroGenero" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-success text-white text-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Gênero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" name="frmAddGenero" id="frmAddGenero">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="nomeGeneroCadastro" class="form-label">Novo Gênero</label>
                        <input type="text" name="nomeGeneroCadastro"
                               class="form-control" id="nomeGeneroCadastro" placeholder="Digite o novo Genero">
                        <div id="GeneroHelp" class="form-text">Aqui você pode escrever um novo gênero de filmes
                            acima.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" id="btnAddGenero" class="btn btn-success">Criar Gênero</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal deletar Genero -->
<div class="modal fade" id="modalDeleteGenero" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white text-center">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Deletar Gênero</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" name="frmDeleteGenero" id="frmDeleteGenero">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <label for="idGeneroDelete"></label>

                        <input type="text" id="idGeneroDelete" name="idGeneroDelete" hidden="hidden">

                        <div id="GeneroHelp" class="alert alert-danger text-center">Esta ação <b>não</b> pode ser
                            desfeita!
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnDeleteGenero" class="btn btn-outline-danger">Deletar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Genero -->
<div class="modal fade" id="modalEditGenero" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white text-center">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Editar Gênero</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" name="frmEditGenero" id="frmEditGenero">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idGeneroEdit"></label><input type="text" id="idGeneroEdit" hidden="hidden">
                        <label for="nomeGeneroEdit" class="form-label">Novo Gênero</label>
                        <input type="text" name="nomeGeneroEdit"
                               class="form-control" id="nomeGeneroEdit" placeholder="Digite o novo Genero">
                        <div id="GeneroHelp" class="form-text">Aqui você pode editar um gênero de filmes
                            acima.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" id="btnEditGenero" class="btn btn-primary">Salvar Alteração</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Cadastro Cliente -->
<div class="modal fade" id="modalCadastroCliente" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white text-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" id="frmAddCliente" name="frmAddGenero">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomeClienteCadastro" class="form-label">Novo Nome:</label>
                        <input type="text" name="nomeClienteCadastro"
                               class="form-control mb-3" id="nomeClienteCadastro">
                        <label for="nascimentoClienteCadastro" class="form-label">Data de Nascimento:</label>
                        <input type="date"
                               name="nascimentoClienteCadastro"
                               class="form-control mb-3" id="nascimentoClienteCadastro">
                        <label for="telefoneClienteCadastro" class="form-label">Telefone:</label>
                        <input type="text" maxlength="13"
                               name="telefoneClienteCadastro"
                               class="form-control mb-3 telefoneBR" id="telefoneClienteCadastro">
                        <label for="cpfClienteCadastro" class="form-label">CPF:</label>
                        <input type="text" maxlength="14"
                               name="cpfClienteCadastro"
                               class="form-control mb-3 cpfClienteCadastro" id="cpfClienteCadastro">
                        <label for="emailClienteCadastro" class="form-label">Email:</label>
                        <input type="email" name="emailClienteCadastro"
                               class="form-control mb-3" id="emailClienteCadastro">
                        <label for="senhaClienteCadastro" class="form-label">Senha:</label>
                        <input type="text" name="senhaClienteCadastro"
                               class="form-control mb-3" id="senhaClienteCadastro">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar
                    </button>
                    <button type="submit" class="btn btn-success" id="btnAddCliente">Criar Usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal deletar Cliente -->
<div class="modal fade" id="modalDeleteCliente" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white text-center">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Deletar Cliente</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" name="frmDeleteCliente" id="frmDeleteCliente">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <label for="idClienteDelete"></label>

                        <input type="text" id="idClienteDelete" name="idClienteDelete" hidden="hidden">

                        <div id="ClienteHelp" class="alert alert-danger text-center">Esta ação <b>não</b> pode ser
                            desfeita!
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnDeleteCliente" class="btn btn-outline-danger">Deletar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Cliente -->
<div class="modal fade" id="modalEditCliente" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" id="frmEditCliente" name="frmEditCliente">
                <div class="modal-body">

                    <div class="mb-3">

                        <label for="idClienteEdit" class="form-label"></label>
                        <input type="text" name="idClienteEdit"
                               class="form-control mb-3" id="idClienteEdit" hidden="hidden">
                        <label for="nomeClienteEdit" class="form-label">Nome:</label>
                        <input type="text" name="nomeClienteEdit"
                               class="form-control mb-3" id="nomeClienteEdit">
                        <label for="nascimentoClienteEdit" class="form-label">Data de Nascimento:</label>
                        <input type="date"
                               name="nascimentoClienteEdit"
                               class="form-control mb-3" id="nascimentoClienteEdit">
                        <label for="telefoneClienteEdit" class="form-label">Telefone:</label>
                        <input type="text" maxlength="13"
                               name="telefoneClienteEdit"
                               class="form-control mb-3 telefoneBR" id="telefoneClienteEdit">
                        <label for="cpfClienteEdit" class="form-label">CPF:</label>
                        <input type="text" maxlength="14"
                               name="cpfClienteEdit"
                               class="form-control mb-3 cpfClienteCadastro" id="cpfClienteEdit">
                        <label for="emailClienteEdit" class="form-label">Email:</label>
                        <input type="email" name="emailClienteEdit"
                               class="form-control mb-3" id="emailClienteEdit">
                        <label for="senhaClienteEdit" class="form-label">Senha:</label>
                        <input type="text" name="senhaClienteEdit"
                               class="form-control mb-3" id="senhaClienteEdit">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar
                    </button>
                    <button type="submit" class="btn btn-primary" id="btnEditCliente">Salvar Modificações</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script src="./js/script.js"></script>
<script src="./js/alterDB.js"></script>
<script src="./js/controle.js"></script>


</html>