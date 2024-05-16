<?php

include '../bd/conecta.php';
include '../util.php';

$campos = array();
foreach (filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW) as $k => $v) {
    switch ($k) {
//        case 'codigo':
//            if (empty($v)) {
//                $campos['ID'] = null;
//            } else {
//                $campos['ID'] = $v;
//            }
//            break;
        case 'ctrcompra':
            $campos['ID_CTR_COMPRA'] = $v;
            break;
        case 'ctrcompra2':
            if (empty($v) OR $v == 0) {
                $campos['ID_CTR_COMPRA_2'] = 'NULL';
            } else {
                $campos['ID_CTR_COMPRA_2'] = $v;
            }
            break;
        case 'ctrvenda':
            $campos['ID_CTR_VENDA'] = $v;
            break;
        case 'ctrvenda2':
            if (empty($v) OR $v == 0) {
                $campos['ID_CTR_VENDA_2'] = 'NULL';
            } else {
                $campos['ID_CTR_VENDA_2'] = $v;
            }
            break;
        case 'placa':
            $campos['PLACA'] = $v;
            break;
        case 'tipo':
            $campos['TIPO_C'] = $v;
            break;
        case 'peso':
            $campos['PESO_AGD'] = $v;
            break;
        case 'data':
            $campos['DATA_AGD'] = dataBRparaSQL($v);
            break;
        case 'frete':
            $campos['FRETE'] = $v;
            break;
        case 'agenc':
            $campos['AGENCIADOR'] = $v;
            break;
        case 'com':
            if (empty($v) OR $v == 0) {
                $campos['COMISSAO'] = 'NULL';
            } else {
                $campos['COMISSAO'] = $v;
            }
            break;
        case 'comt':
            if (empty($v) OR $v == 0) {
                $campos['COMISSAO_TON'] = 'NULL';
            } else {
                $campos['COMISSAO_TON'] = $v;
            }
            break;
        case 'obs':
            $campos['OBSERVACAO'] = $v;
            break;
    }
}

$sql;
$r;
//if ($campos['id'] == null) {
$sql = 'INSERT INTO CARGAS VALUES (NULL, '
        . $campos['ID_CTR_COMPRA'] . ', '
        . $campos['ID_CTR_COMPRA_2'] . ', '
        . $campos['ID_CTR_VENDA'] . ', '
        . $campos['ID_CTR_VENDA_2'] . ', "'
        . $campos['PLACA'] . '", "'
        . $campos['TIPO_C'] . '", '
        . $campos['PESO_AGD'] . ', "'
        . $campos['DATA_AGD'] . '", '
        . $campos['FRETE'] . ', "'
        . $campos['AGENCIADOR'] . '", '
        . $campos['COMISSAO'] . ', '
        . $campos['COMISSAO_TON'] . ', "'
        . $campos['OBSERVACAO'] . '", "A")';
$r = 'I';
//} else {
//    $sql = 'UPDATE EMBARQUES SET '
//            . 'COD_MUNICIPIO="' . $campos['municipio'] . '", '
//            . 'COD_PRODUTO="' . $campos['produto'] . '", '
//            . 'LOCAL="' . $campos['local'] . '", '
//            . 'SALDO=' . $campos['saldo'] . ', '
//            . 'OBSERVACAO=' . $campos['obs'] . ' '
//            . 'WHERE ID=' . $campos['id'];
//    $r = 'A';
//}
$con->query($sql);
$con->close();
echo $r;
