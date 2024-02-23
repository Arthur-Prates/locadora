<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    $retornoValidar = validarSenhaCriptografada('idadm,nome,email,senha', 'adm', 'email', 'senha', 'ativo', $email, $pass, 'A');

    if ($retornoValidar) {
        if ($retornoValidar === 'usuario') {
            echo json_encode(['success' => false, 'message' => "Usuário Inválido"], JSON_THROW_ON_ERROR);
        } else if ($retornoValidar === 'senha') {
            echo json_encode(['success' => false, 'message' => "Senha Inválida"], JSON_THROW_ON_ERROR);

        } else {
            $_SESSION['idadm'] = $retornoValidar->idadm;
            $_SESSION['nome'] = $retornoValidar->nome;
            $_SESSION['email'] = $retornoValidar->email;
            $_SESSION['senha'] = $retornoValidar->senha;
            $senha = $_SESSION['senha'];
            $nome = $_SESSION['nome'];
            echo json_encode(['success' => true, 'message' => "Olá <b>$nome</b>, Login efetuado com sucesso! Redirecionando..."], JSON_THROW_ON_ERROR);
        }
    } else {
        echo json_encode(['success' => False, 'message' => "Usuário ou senha inválidos"], JSON_THROW_ON_ERROR);
    }
}
//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

