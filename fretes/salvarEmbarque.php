<?php

include '../bd/conecta.php';
include '../util.php';

$campos = array();
foreach (filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW) as $k => $v) {
    switch ($k) {
        case 'CodEmb':
            if (empty($v)) {
                $campos['id'] = 'NULL';
            } else {
                $campos['id'] = $v;
            }
            break;
        case 'Local':
            $campos['local'] = $v;
            break;
        case 'Obs':
            if (empty($v)) {
                $campos['obs'] = 'NULL';
            } else {
                $campos['obs'] = '"' . $v . '"';
            }
            break;
        case 'Produto':
            $campos['produto'] = $v;
            break;
        case 'Saldo':
            if (empty($v) OR $v == 0) {
                $campos['saldo'] = 'NULL';
            } else {
                $campos['saldo'] = $v;
            }
            break;
        case 'CodMun':
            $campos['municipio'] = $v;
            break;
    }
}

$sql;
$r;
if ($campos['id'] == 'NULL') {
    $sql = 'INSERT INTO EMBARQUES VALUES ('
            . $campos['id'] . ', "'
            . $campos['municipio'] . '", "'
            . $campos['produto'] . '", "'
            . $campos['local'] . '", '
            . $campos['saldo'] . ', '
            . $campos['obs'] . ')';
    $r = 'I';
} else {
    $sql = 'UPDATE EMBARQUES SET '
            . 'COD_MUNICIPIO="' . $campos['municipio'] . '", '
            . 'COD_PRODUTO="' . $campos['produto'] . '", '
            . 'LOCAL="' . $campos['local'] . '", '
            . 'SALDO=' . $campos['saldo'] . ', '
            . 'OBSERVACAO=' . $campos['obs'] . ' '
            . 'WHERE ID=' . $campos['id'];
    $r = 'A';
}

$con->query($sql);
$con->close();
echo $r;
