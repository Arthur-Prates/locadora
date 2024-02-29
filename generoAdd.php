<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode([$Dados]);
if (isset($Dados) && !empty($Dados)) {
    $genero = isset($Dados['nomeGeneroCadastro']) ? addslashes(mb_strtoupper($Dados['nomeGeneroCadastro'], 'UTF-8')) : '';
    $retornoInsert = insertGlobal('genero', 'genero', "$genero");

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Gênero <b>$genero</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Gênero Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Gênero Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
}
