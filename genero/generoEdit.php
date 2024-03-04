<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode([$Dados]);

if (isset($Dados) && !empty($Dados)) {
    $genero = isset($Dados['nomeGeneroEdit']) ? addslashes(mb_strtoupper($Dados['nomeGeneroEdit'], 'UTF-8')) : '';
    $user = isset($Dados['UserLast']) ? addslashes(mb_strtoupper($Dados['UserLast'], 'UTF-8')) : '';
    $id = isset($Dados['id']) ? addslashes(mb_strtoupper($Dados['id'], 'UTF-8')) : '';
    $retornoInsert = alterarGlobal('genero', 'genero', $genero, 'idgenero', $id);
    $retornoInsert2 = alterarGlobal('genero', 'userAlter', $user, 'idgenero', $id);

    if ($retornoInsert > 0 &&  $retornoInsert2 > 0) {
        try {
            echo json_encode(['success' => true, 'message' => "Gênero <b>$genero</b> alterado com sucesso"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    } else {
        try {
            echo json_encode(['success' => false, 'message' => "Gênero Não alterado! Error Bd"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    }
} else {
    try {
        echo json_encode(['success' => false, 'message' => "Gênero Não alterado! Error Variável"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
}
