<?php

include '../bd/conecta.php';
include '../util.php';

$campos = array();
foreach (filter_input_array(INPUT_POST, FILTER_DEFAULT) as $k => $v) {
    switch ($k) {
        case 'cavalo':
            $campos['cav'] = str_replace('-', '', $v);
            break;
        case 'reboque1':
            empty($v) ? $campos['reb1'] = null : $campos['reb1'] = str_replace('-', '', $v);
            break;
        case 'reboque2':
            empty($v) ? $campos['reb2'] = null : $campos['reb2'] = str_replace('-', '', $v);
            break;
        case 'reboque3':
            empty($v) ? $campos['reb3'] = null : $campos['reb3'] = str_replace('-', '', $v);
            break;
        case 'peso':
            $campos['pes'] = $v;
            break;
        case 'tipo':
            $campos['tip'] = $v;
            break;
    }
}

//CADASTRO DE VEICULO(S)
$vei = array();
$conj = array();

$vei[] = '("' . $campos['cav'] . '", "T")';
$conj[] = '"' . $campos['cav'] . '"';
if (!is_null($campos['reb1'])) {
    $vei[] = '("' . $campos['reb1'] . '", "R")';
    $conj[] = '"' . $campos['reb1'] . '"';
}
if (!is_null($campos['reb2'])) {
    $vei[] = '("' . $campos['reb2'] . '", "R")';
    $conj[] = '"' . $campos['reb2'] . '"';
}
if (!is_null($campos['reb3'])) {
    $vei[] = '("' . $campos['reb3'] . '", "R")';
    $conj[] = '"' . $campos['reb3'] . '"';
}
$conj[] = '"' . $campos['tip'] . '"';
$conj[] = $campos['pes'];

try {
    $sql = 'INSERT IGNORE INTO VEICULOS (PLACA, TIPO) VALUES ' . implode(', ', $vei);
    $con->query($sql);
} catch (Exception $e) {
    
}

//CADASTRO DE CONJUNTO
$cconj = array();
$cconj[] = 'PLACA_TRACAO';
$a = count($conj);
if ($a >= 4) {
    $cconj[] = 'PLACA_REB_1';
}
if ($a >= 5) {
    $cconj[] = 'PLACA_REB_2';
}
if ($a == 6) {
    $cconj[] = 'PLACA_REB_3';
}
$cconj[] = 'TIPO';
$cconj[] = 'PESO_AGD';

try {
    foreach (array_combine($cconj, $conj) as $k => $v) {
        if ($k = 'PLACA_REB_1' or $k = 'PLACA_REB_2' or $k = 'PLACA_REB_3') {

            $sql = 'SELECT * FROM CONJUNTOS WHERE ' . $v . ' IN (PLACA_REB_1, PLACA_REB_2, PLACA_REB_3)';
            $res = $con->query($sql);
            $a = $res->fetch_assoc();
            if (mysqli_num_rows($res) > 0 and $a['PLACA_TRACAO'] != $campos['cav']) {
                throw new Exception('Carreta ' . substr_replace(str_replace('"', '', $v), '-', 3, 0) . ' já cadastrada no cavalo ' . substr_replace($a['PLACA_TRACAO'], '-', 3, 0) . '!');
            }
        }
    }

    try {
        $sql = 'INSERT INTO CONJUNTOS (' . implode(', ', $cconj) . ') VALUES '
                . '(' . implode(', ', $conj) . ')';
        $con->query($sql);
        echo 'I';
    } catch (Exception $e) {
        $uc = array();
        foreach (array_combine($cconj, $conj) as $k => $v) {
            if ($k != 'PLACA_TRACAO') {
                $uc[] = $k . ' = ' . $v;
            }
        }

        switch (count($uc)) {
            case 2:
                $uc[] = 'PLACA_REB_1 = NULL';
                $uc[] = 'PLACA_REB_2 = NULL';
                $uc[] = 'PLACA_REB_3 = NULL';
                break;
            case 3:
                $uc[] = 'PLACA_REB_2 = NULL';
                $uc[] = 'PLACA_REB_3 = NULL';
                break;
            case 4:
                $uc[] = 'PLACA_REB_3 = NULL';
                break;
        }

        $sql = 'UPDATE CONJUNTOS SET ' . implode(', ', $uc) . ' WHERE PLACA_TRACAO = "' . $campos['cav'] . '"';
        $con->query($sql);
        echo 'A';
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

$con->close();
