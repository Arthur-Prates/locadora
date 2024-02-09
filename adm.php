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
    <div class="col-2 bg-black text-center text-white" id='navLateral'>
        <?php
        include_once('navlateral.php');
        ?>
    </div>
    <div class="col-10">
        <div class="container">
            <?php
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'genero') {
                    include_once('./genero.php');
                } else if ($page === 'cliente') {
                    include_once('./cliente.php');
                } else if ($page === 'filme') {
                    include_once('./filme.php');
                } else {
                    echo '<h1>AAAA</h1>';
                }
            } else {
                echo '<h1>BEM VINDO AO ADM</h1>';
            }
            ?>
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
</body>

</html>