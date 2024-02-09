<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($_POST['email'])) {
    $email =$_POST['email'];
    $pass =$_POST['senha'];
};

$bancodedados = true;
if ($bancodedados) {

echo json_encode(['success' => true, 'message' => "Email: $email <br> Senha: $pass"], JSON_THROW_ON_ERROR);

} else {
echo json_encode(['success' => False, 'message' => "Email ou senha incorreto"], JSON_THROW_ON_ERROR);
}

//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

