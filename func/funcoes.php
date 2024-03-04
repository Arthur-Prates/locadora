<?php
function listarTabela($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoin($campos, $tabela1, $tabela2, $id1, $id2, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela1 t INNER JOIN $tabela2 y ON t.$id1 = y.$id2 ORDER BY $ordem $tipoOrdem");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoinTriplo($campos, $tabela1, $tabela2, $tabela3, $id1, $id2, $id3, $id4, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela1 t INNER JOIN $tabela2 y ON t.$id1 = y.$id2 INNER JOIN $tabela3 i ON t.$id3 = i.$id4 ORDER BY $ordem $tipoOrdem");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function validarSenhaCriptografada($campos, $tabela, $BDString1, $BDString2, $BDAtivo, $campoParametro1, $campoParametro2, $campoParametroAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos " . "FROM $tabela WHERE " . "$BDString1 = ? " . "AND $BDAtivo = ?");
        $sqlLista->bindValue(1, $campoParametro1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $campoParametroAtivo, PDO::PARAM_STR);
//                $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            $retornoSql = $sqlLista->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->$BDString2;
            if (password_verify($campoParametro2, $senha_hash)) {
                return $retornoSql;
            }
            return 'senha';

        } else {
            return 'usuario';
        }
        return null;
    } catch
    (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        throw $e;
    }
    $conn = null;
}


function listarTabelaOrdenada($campos, $tabela, $campoOrdem, $ASCouDESC)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem $ASCouDESC");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}


function alterarGlobal($tabela, $campo, $valor, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo = '$valor' WHERE  $identificar = $id ;");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}


function deletecadastro($tabela, $NomeDoCampoId, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("DELETE FROM $tabela WHERE $NomeDoCampoId = '$id' ");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

;

function insertGlobal($tabela, $dados, $novosDados1,$novosDados2)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES ('$novosDados1','$novosDados2')");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

;


function dataHoraGlobal($data, $hora = 'S', $pais = 'BR')
{
    $data = new DateTime($data);
    if ($pais === 'BR') {
        if ($hora === 'S') {
            echo $data->format('Y-m-d H:i:s');
        } else {
            echo $data->format('Y-m-d');
        }
    } else if ($pais === 'US') {
        if ($hora === 'S') {
            echo $data->format('d-m-Y H:i:s');
        } else {
            echo $data->format('d-m-Y');
        }
    }
    return $data;
}

function conversorDBNum($numm)
{
    $numero = $numm;
    $numero = number_format($numero, 2, ',', '');
    return $numero;
}

function conversorDBNumPonto($numm)
{
    $numero = $numm;
    $numero = number_format($numero, 2, '.', '');
    return $numero;
}

function ucfirst_tr($str)
{
    $trMap = ['Á' => 'á', 'É' => 'é', 'Í' => 'í', 'Ó' => 'ó', 'Ú' => 'ú', 'Ã' => 'ã', 'Õ' => 'õ', 'Â' => 'â', 'Ê' => 'ê', 'Î' => 'î', 'Ô' => 'ô', 'Û' => 'û', 'À' => 'à', 'È' => 'è', 'Ì' => 'ì', 'Ò' => 'ò', 'Ù' => 'ù'];
    $str = mb_strtolower(strtr($str, $trMap));
    $first = mb_substr($str, 0, 1);
    $first = strtr($first, array_flip($trMap));
    $first = mb_strtoupper($first);
    return $first . mb_substr($str, 1);
}

?>