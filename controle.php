<?php

include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
if (!empty($controle) && isset($controle)) {
    switch ($controle) {
        case 'listaAlugado':
            include_once('alugado/locar.php');
            break;
        case 'listaCliente':
            include_once('cliente/cliente.php');
            break;
        case 'listaFilme':
            include_once('filme/filme.php');
            break;
        case 'listaGenero':
            include_once('genero/genero.php');
            break;
        case 'generoAdd':
            include_once('genero/generoAdd.php');
            break;
        case 'generoEdit':
            include_once('genero/generoEdit.php');
            break;
        case 'generoDelete':
            include_once('genero/generoDelete.php');
            break;
        case 'clienteAdd':
            include_once('cliente/clienteAdd.php');
            break;
        case 'clienteEdit':
            include_once('cliente/clienteEdit.php');
            break;
        case 'clienteDelete':
            include_once('cliente/clienteDelete.php');
            break;
    }

} else {
    echo '<div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">';
    echo '<h1 >Página Vazia, Retorne.</h1>';
    echo '<img src="./img/vazio.gif" alt="ERROR 404">';
    echo '</div>';
}

//$acao = filter_input(INPUT_POST, 'ação', FILTER_SANITIZE_STRING);
//$acaoId = filter_input(INPUT_POST, 'acaoId', FILTER_SANITIZE_NUMBER_INT);
//$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);

