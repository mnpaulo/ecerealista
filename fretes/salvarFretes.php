<?php

include '../bd/conecta.php';
include '../util.php';

$json = json_decode(file_get_contents('php://input'), true);

$r = array();
foreach ($json['fretes'] as $v) {
    array_push($r, $v['valor']);
    try {
        $sql = 'INSERT INTO FRETES VALUES ("' . dataBRparaSQL($json['data']) . '", ' . $json['idemb'] . ', "' . $v[0] . '", ' . $v[1] . ')';
        $con->query($sql);
        array_push($r, $sql);
    } catch (Exception $e) {
        $sql = 'UPDATE FRETES SET VALOR = ' . $v[1] . ' WHERE DATA = "' . dataBRparaSQL($json['data']) . '" AND ID_EMBARQUE = ' . $json['idemb'] . ' AND COD_MUNICIPIO = "' . $v[0] . '"';
        $con->query($sql);
        array_push($r, $sql);
    }
}
$con->close();
print_r($r);
