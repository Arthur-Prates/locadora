<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
//$options = [
//    'cost' => 12,
//];
//$senha = 'amem@2timoteo.com.br';
//$senhaHash = password_hash($senha, PASSWORD_BCRYPT, $options);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Manda Series | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>
    <style>
        .bgLogin {
            background: url("./img/wall.jpg");
            background-size: cover;
            backdrop-filter: saturate(100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="bgLogin">
<nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand fonteLogo" href="./index.php">Manda <font
                    style="background-color:#39BB2D;color: #1A1A1A;padding: 2px">Series</font></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./login.php"><span class='mdi mdi-login'></span>
                        Entrar</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 bg-black" type="search" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Procurar</button>
            </form>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row d-flex justify-content-center aling-items-center">

        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
            <div class="mt-5 formLogin p-5">

                <h1 class="text-center">Manda Series | Login</h1>
                <form action="#" method="post" id="formLogin">
                    <div class="mb-3">
                        <label for="emailLogin" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin">
                    </div>
                    <label for="senhaLogin" class="form-label">Senha:</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control  " id="senhaLogin" name="senhaLogin">
                        <span id="verSenha" class='mdi mdi-eye-off input-group-text'></span>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="lembrarSenha" name="lembrarSenha">
                        <label class="form-check-label" for="lembrarSenha">Lembrar Senha</label>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show text-center" id="erroMsg" role="alert"
                         style="display: none">
                        <p><strong>Senha Errada,</strong> tente novamente.</p>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary " onclick="fazerLogin();">Entrar</button>
                    </div>
                    <div><p class="text-center mt-3">Não tem Uma Conta?<a href="register.php"> Resgistre-se</a></p></div>
                    <?php
                    //                    if (!empty($senhaHash)) {
                    //                        echo $senhaHash;
                    //                    }

                    ?>
                </form>
                <hr>
                <div class="text-center"><?php

                    echo strftime('%A, %d de %B de %Y', strtotime('today'));
                    ?></div>
            </div>
            <?php

            ?>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="./js/login.js"></script>
</body>
</html>



