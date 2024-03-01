<h1 class="text-center text-white bg-black p-0 pt-2 m-0 fonteLogo">PAINEL DE <font
            style="background-color:#39BB2D;color: #1A1A1A;">CONTROLE</font></h1>
<nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./adm.php"><img src="./img/icon.png" alt="" class="bg-black"
                                                       style="width: 50px; height: 50px; border-radius: 50%">
            <?php
                if (isset($_SESSION['nome']) & !empty($_SESSION['nome'])) {
                $nome = $_SESSION['nome'];
                echo $nome;
                } ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a  href="./login/logout.php">
                        <button class="btn btn-outline-danger " onclick="limparCookies()" >Sair</button>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
    