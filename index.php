<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Locadora</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
</head>


<body>
<?php
include_once('./navbar/nav.php');
$filme = listarTabelaInnerJoin('*', 'filme', 'genero', 'idgenero', 'idgenero', 'nomefilme', 'ASC');
?>
<img src="./img/banner.png" alt="" class='img-fluid mb-5'>
<div class="container d-flex justify-content-center">


    <div class="row d-flex justify-content-center ">

        <div class="alert bg-black text-white" role="alert">
            <h3 class="text-center">Filmes Musicais</h3>
        </div>
        <?php
        $photos = array("sing.webp", "missao-impossivel.png", "bird-box.png", "ela-danca.png", "corra.png");

        foreach ($filme as $filmes) {
            $genero = $filmes->genero;
            $filmesNome = $filmes->nomeFilme;
            $filmesvalor = $filmes->valor;
            $filmesAno = $filmes->ano;
            if ($genero === 'MUSICAL') {

                shuffle($photos);
                $randomPhoto = $photos[0];
                ?>
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="./img/<?php echo $randomPhoto; ?>" alt="">
                        <div class="card-body ">
                            <h5 class="card-title text-center">
                                <?php echo $filmesNome ?>
                            </h5>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class='d-flex justify-content-center mt-2'>
                                        <?php echo 'R$ ' . conversorDBNum($filmesvalor) ?>
                                    </h6>
                                </div>
                                <div class="col-6">
                                    <h6 class='d-flex justify-content-center mt-2'>
                                        <?php echo $filmesAno ?>
                                    </h6>
                                </div>
                            </div>
                            <button class="btn w-100 btn-outline-success d-flex justify-content-center">Assista
                                Agora
                            </button>

                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>
        <div class="alert bg-black text-white" role="alert">
            <h3 class="text-center">Filmes De Terror</h3>
        </div>
        <?php

        foreach ($filme as $filmes) {
            $genero = $filmes->genero;
            $filmesNome = $filmes->nomeFilme;
            $filmesvalor = $filmes->valor;
            $filmesAno = $filmes->ano;
            if ($genero === 'TERROR') {
                shuffle($photos);
                $randomPhoto = $photos[0];
                ?>
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="./img/<?php echo $randomPhoto; ?>" alt="">
                        <div class="card-body ">
                            <h5 class="card-title text-center">
                                <?php echo $filmesNome ?>
                            </h5>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class='d-flex justify-content-center mt-2'>
                                        <?php echo 'R$ ' . conversorDBNum($filmesvalor) ?>
                                    </h6>
                                </div>
                                <div class="col-6">
                                    <h6 class='d-flex justify-content-center mt-2'>
                                        <?php echo $filmesAno ?>
                                    </h6>
                                </div>
                            </div>
                            <button class="btn w-100 btn-outline-success d-flex justify-content-center">Assista
                                Agora
                            </button>

                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>
        <div class="alert bg-black text-white" role="alert">
            <h3 class="text-center">Filmes Comédia</h3>
        </div>


        <?php foreach ($filme as $filmes) : ?>
            <?php
            $genero = $filmes->genero;
            $filmesNome = $filmes->nomeFilme;
            $filmesvalor = $filmes->valor;
            $filmesAno = $filmes->ano;
            if ($genero === 'COMÉDIA') :
                shuffle($photos);
                $randomPhoto = $photos[0];
                ?>
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="./img/<?php echo $randomPhoto; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $filmesNome ?></h5>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="d-flex justify-content-center mt-2"><?php echo 'R$ ' . conversorDBNum($filmesvalor) ?></h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="d-flex justify-content-center mt-2"><?php echo $filmesAno ?></h6>
                                </div>
                            </div>
                            <button class="btn w-100 btn-outline-success d-flex justify-content-center">Assista Agora
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


    </div>
</div>
<?php
include_once('footer.php');
?>

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
</body>

</html>