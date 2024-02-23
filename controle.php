<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
$acaoId = filter_input(INPUT_POST, 'acaoId', FILTER_SANITIZE_NUMBER_INT);
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);

switch ($acao) {
    case 'listaCliente':
        include_once('cliente.php');
    case 'listaFilme':
        include_once('filme.php');
    case 'listaGenero':
        include_once('genero.php');
    case 'listaAlugado':
        include_once('locar.php');
    default:
        include_once('adm.php');
}
switch ($controle) {
    case '':
        include_once('');
}