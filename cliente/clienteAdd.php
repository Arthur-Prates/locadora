<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//    echo json_encode([$Dados]);
//


if (isset($Dados) && !empty($Dados)) {
    $nomeCliente = isset($Dados['nomeClienteCadastro']) ? addslashes(mb_strtoupper($Dados['nomeClienteCadastro'], 'UTF-8')) : '';
    $nascimento = isset($Dados['nascimentoClienteCadastro']) ? addslashes(mb_strtoupper($Dados['nascimentoClienteCadastro'], 'UTF-8')) : '';
    $telefone = isset($Dados['telefoneClienteCadastro']) ? addslashes(mb_strtoupper($Dados['telefoneClienteCadastro'], 'UTF-8')) : '';
    $email = isset($Dados['emailClienteCadastro']) ? addslashes(mb_strtoupper($Dados['emailClienteCadastro'], 'UTF-8')) : '';
    $senhacliente = isset($Dados['senhaClienteCadastro']) ? addslashes(mb_strtoupper($Dados['senhaClienteCadastro'], 'UTF-8')) : '';
    $cpf = isset($Dados['cpfClienteCadastro']) ? addslashes(mb_strtoupper($Dados['cpfClienteCadastro'], 'UTF-8')) : '';
    $userLast = isset($Dados['UserLast']) ? addslashes(mb_strtoupper($Dados['UserLast'], 'UTF-8')) : '';
    $options = [
        'cost' => 12,
    ];

    $senhaHash = password_hash($senhacliente, PASSWORD_BCRYPT, $options);


    $retornoInsert = insertCliente('cliente', 'nome, nascimento, telefone, email, senha, cpf,userAlter', "$nomeCliente", "$nascimento", "$telefone", "$email", "$senhaHash", "$cpf", "$userLast");


    if ($retornoInsert > 0) {
        try {
            echo json_encode(['success' => true, 'message' => "Cliente <b>$nomeCliente</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    } else {
        try {
            echo json_encode(['success' => false, 'message' => "Cliente Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        }
    }
} else {
    try {
        echo json_encode(['success' => false, 'message' => "Cliente Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
}
