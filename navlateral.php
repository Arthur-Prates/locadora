<h1 class='mt-5 mb-3'>Olá <?php echo $_SESSION['nome']?></h1>
<p><?php
    echo strftime('%d de %B de %Y', strtotime('today'));
    ?></p>
<hr>


<button class="btn btn-dark w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Dados
</button>
<div class="collapse bg-black w-100" id="collapseExample">
    <div class="card card-body text-white bg-black ">

            <li style="list-style: none;"><a class="dropdown-item efeitoHover text-center" href="adm.php?page=locado"><b>Alugado</b></a></li>
            <hr class='text-white'>
            <li style="list-style: none;"><a class="dropdown-item efeitoHover text-center" href="adm.php?page=cliente"><b>Cliente</b></a></li>
            <hr class='text-white'>
            <li style="list-style: none;"><a class="dropdown-item efeitoHover text-center" href="adm.php?page=genero"><b>Genero</b></a></li>
            <hr class='text-white'>
            <li style="list-style: none;"><a class="dropdown-item efeitoHover text-center" href="adm.php?page=filme"><b>Filme</b></a></li>

    </div>
</div>
