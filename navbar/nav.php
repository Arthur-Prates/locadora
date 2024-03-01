<nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand fonteLogo" href="../index.php">Manda <font
                    style="background-color:#39BB2D;color: #1A1A1A;padding: 2px">Series</font></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " role="button" data-bs-toggle="dropdown"
                       aria-expanded="false" href="../index.php"><span class="mdi mdi-account"></span> Conta</a>
                    <ul class="dropdown-menu bg-black">
                        <li><a class="dropdown-item bg-black" href="#" ">Configurações</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item bg-black" href="./login/login.php" ">Sair</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Generos
                    </a>
                    <ul class="dropdown-menu bg-black">
                        <?php
                        $generosFilme = listarTabela('*', 'genero');
                            $barrinha = 0;
                        foreach ($generosFilme as $genero) {
                            $generossNome = $genero->genero;
                            ?>
                            <?php
                            if ($barrinha !== 0) {
                                ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <?php

                            }
                            ?>

                            <li><a class="dropdown-item bg-black"
                                   href="../index.php?page=<?php echo $generossNome ?>"><?php echo ucfirst(strtolower($generossNome)) ?></a>
                            </li>
                            <?php
                            ++$barrinha;
                        }
                        ?>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 bg-black" type="search" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Procurar</button>
            </form>
        </div>
    </div>
</nav>
