<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode([$Dados]);

if (isset($Dados) && !empty($Dados)) {
    $genero = isset($Dados['idGeneroDelete']) ? addslashes(mb_strtoupper($Dados['idGeneroDelete'], 'UTF-8')) : '';
    $retornoInsert = deletecadastro('genero', 'idgenero', "$genero");


    if ($retornoInsert > 0) {
        try {
            echo json_encode(['success' => true, 'message' => "Gênero <b>$genero</b> deletado com sucesso"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    } else {
        try {
            echo json_encode(['success' => false, 'message' => "Gênero Não deletado! Error Bd"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    }
} else {
    try {
        echo json_encode(['success' => false, 'message' => "Gênero Não deletado! Error Variável"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
}
