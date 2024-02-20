<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $pass = $_POST['senha'];
};

$bancodedados = validarSenha('idadm,nome,email,senha', 'adm', 'email', 'senha', 'ativo', "$email", "$pass", 'A');
if ($bancodedados=='Vazio') {
    echo json_encode(['success' => False, 'message' => "Email ou senha incorreto"], JSON_THROW_ON_ERROR);

} else {
    foreach ($bancodedados as $bancodedadoItem) {
        $idadm=$bancodedadoItem->idadm;
        $nome=$bancodedadoItem->nome;
        $email=$bancodedadoItem->email;
        $senha=$bancodedadoItem->senha;
    }
    $_SESSION['idadm']=$idadm;
    $_SESSION['nome']=$nome;
    $_SESSION['email']=$email;
    $_SESSION['senha']=$senha;
    echo json_encode(['success' => true, 'message' => "Olá <b>$nome</b>, Login efetuado com sucesso! Redirecionando..."], JSON_THROW_ON_ERROR);
}

//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

