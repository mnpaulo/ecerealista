<?php

include '../bd/conecta.php';
include '../util.php';

$data = dataBRparaSQL(filter_input(INPUT_POST, 'data'));
$id_emb = filter_input(INPUT_POST, 'id');
$r = array();

$sql = 'SELECT EMBARQUES.ID, EMBARQUES.LOCAL, MUNICIPIOS.NOME '
        . 'FROM EMBARQUES '
        . 'INNER JOIN MUNICIPIOS ON EMBARQUES.COD_MUNICIPIO = MUNICIPIOS.CODIGO '
        . 'WHERE EMBARQUES.ID = ' . $id_emb;
$res = $con->query($sql);
$row = $res->fetch_assoc();

$r['local'] = $row['LOCAL'];
$r['nomemun'] = $row['NOME'];

$sql = 'SELECT FRETES.COD_MUNICIPIO, FRETES.VALOR, MUNICIPIOS.NOME, MUNICIPIOS.UF '
        . 'FROM FRETES '
        . 'INNER JOIN MUNICIPIOS ON FRETES.COD_MUNICIPIO = MUNICIPIOS.CODIGO '
        . 'WHERE DATA = "' . $data . '" AND ID_EMBARQUE = ' . $id_emb;
$res = $con->query($sql);

$x = 0;
while ($row = $res->fetch_assoc()) {
    $r['fretes'][$x]['cod'] = $row['COD_MUNICIPIO'];
    $r['fretes'][$x]['nome'] = $row['NOME'];
    $r['fretes'][$x]['uf'] = $row['UF'];
    $r['fretes'][$x]['valor'] = $row['VALOR'];
    $x++;
}

echo json_encode($r);
$con->close();
