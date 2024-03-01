<?php

include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
if (!empty($controle) && isset($controle)) {
    switch ($controle) {
        case 'listaCliente':
            include_once('cliente/cliente.php');
            break;
        case 'listaFilme':
            include_once('filme/filme.php');
            break;
        case 'listaGenero':
            include_once('genero/genero.php');
            break;
        case 'listaAlugado':
            include_once('alugado/locar.php');
            break;
        case 'generoAdd':
            include_once('genero/generoAdd.php');
            break;
        case 'generoAlt':
            include_once('genero/generoAlt.php');
            break;
        default:
            include_once('adm.php');
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

