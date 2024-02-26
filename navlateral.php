<h1 class='mt-5 mb-3'>Olá <?php echo $_SESSION['nome']?></h1>
<p><?php
    echo strftime('%d de %B de %Y', strtotime('today'));
    ?></p>
<hr>


<button class="btn btn-dark w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <b>REGISTROS</b>
</button>
<div class="collapse bg-black w-100" id="collapseExample">
    <div class="card card-body text-white bg-black ">
<ul class="m-0 p-0">
            <li style="list-style: none;cursor: pointer"><a class="dropdown-item efeitoHover text-center" onclick="carregarConteudo('listaAlugado')" ><b>Alugado</b></a></li>
            <hr class='text-white'>
            <li style="list-style: none;cursor: pointer"><a class="dropdown-item efeitoHover text-center" onclick="carregarConteudo('listaCliente')"><b>Cliente</b></a></li>
            <hr class='text-white'>
            <li style="list-style: none;cursor: pointer"><a class="dropdown-item efeitoHover text-center" onclick="carregarConteudo('listaGenero')" ><b>Genero</b></a></li>
            <hr class='text-white'>
            <li style="list-style: none;cursor: pointer"><a class="dropdown-item efeitoHover text-center" onclick="carregarConteudo('listaFilme')" ><b>Filme</b></a></li>
</ul>

    </div>
</div>
