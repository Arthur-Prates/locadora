<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode([$Dados]);

if (isset($Dados) && !empty($Dados)) {
    $id = isset($Dados['nomeClienteEdit']) ? addslashes(mb_strtoupper($Dados['id'], 'UTF-8')) : '';
    $nomeCliente = isset($Dados['nomeClienteEdit']) ? addslashes(mb_strtoupper($Dados['nomeClienteEdit'], 'UTF-8')) : '';
    $nascimento = isset($Dados['nascimentoClienteEdit']) ? addslashes(mb_strtoupper($Dados['nascimentoClienteEdit'], 'UTF-8')) : '';
    $telefone = isset($Dados['telefoneClienteEdit']) ? addslashes(mb_strtoupper($Dados['telefoneClienteEdit'], 'UTF-8')) : '';
    $email = isset($Dados['emailClienteEdit']) ? addslashes(mb_strtoupper($Dados['emailClienteEdit'], 'UTF-8')) : '';
    $senhacliente = isset($Dados['senhaClienteEdit']) ? addslashes(mb_strtoupper($Dados['senhaClienteEdit'], 'UTF-8')) : '';
    $cpf = isset($Dados['cpfClienteEdit']) ? addslashes(mb_strtoupper($Dados['cpfClienteEdit'], 'UTF-8')) : '';
    $userLast = isset($Dados['UserLast']) ? addslashes(mb_strtoupper($Dados['UserLast'], 'UTF-8')) : '';
    $options = [
        'cost' => 12,
    ];

    $senhaHash = password_hash($senhacliente, PASSWORD_BCRYPT, $options);
    $retornoInsert = alterarGlobal('cliente', 'nome', $nomeCliente, 'idcliente', $id);
    $retornoInsert2 = alterarGlobal('cliente', 'nascimento', $nascimento, 'idcliente', $id);
    $retornoInsert3 = alterarGlobal('cliente', 'telefone', $telefone, 'idcliente', $id);
    $retornoInsert4 = alterarGlobal('cliente', 'email', $email, 'idcliente', $id);
    $retornoInsert5 = alterarGlobal('cliente', 'senha', $senhaHash, 'idcliente', $id);
    $retornoInsert6 = alterarGlobal('cliente', 'cpf', $cpf, 'idcliente', $id);
    $retornoInsert7 = alterarGlobal('cliente', 'userAlter', $userLast, 'idcliente', $id);

    if ($retornoInsert > 0 && $retornoInsert2 > 0 && $retornoInsert3 > 0 && $retornoInsert4 > 0 && $retornoInsert5 > 0 && $retornoInsert6 > 0 && $retornoInsert7 > 0) {
        try {
            echo json_encode(['success' => true, 'message' => "Cliente <b>$nomeCliente</b> alterado com sucesso"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    } else {
        try {
            echo json_encode(['success' => false, 'message' => "cliente Não alterado! Error Bd"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    }
} else {
    try {
        echo json_encode(['success' => false, 'message' => "cliente Não alterado! Error Variável"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
}
