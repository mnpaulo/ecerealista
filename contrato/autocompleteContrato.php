<?php

include '../bd/conecta.php';

$query = trim(filter_input(INPUT_POST, 'query'));
$produto = trim(filter_input(INPUT_POST, 'related'));

$sql = 'SELECT CONTRATOS.ID, CONTRATOS.NUMERO, PESSOAS.NOME_FANTASIA, MUNICIPIOS.NOME, MUNICIPIOS.UF '
        . 'FROM ((CONTRATOS '
        . 'INNER JOIN PESSOAS ON IFNULL(CONTRATOS.ID_PES_RET_ENT, CONTRATOS.ID_PESSOA) = PESSOAS.ID) '
        . 'INNER JOIN MUNICIPIOS ON PESSOAS.CODIGO_MUNICIPIO = MUNICIPIOS.CODIGO) '
        . 'WHERE CONTRATOS.STATUS = "A" AND CONTRATOS.CODIGO_PRODUTO = "' . $produto . '" AND (MUNICIPIOS.NOME LIKE "%' . $query . '%" OR PESSOAS.NOME_FANTASIA LIKE "%' . $query . '%" OR PESSOAS.RAZAO_SOCIAL LIKE "%' . $query . '%")';
$res = $con->query($sql);

$r = array();
$x = 0;
while ($row = $res->fetch_assoc()) {
    $r[$x]['value'] = $row['ID'];
    $r[$x]['label'] = 'CTR Nº ' . $row['NUMERO'] . ' — ' . $row['NOME_FANTASIA'] . '<br>' . $row['NOME'] . '-' . $row['UF'];
    $x++;
}
echo json_encode($r);

$con->close();
