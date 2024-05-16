<?php

include '../bd/conecta.php';

$query = trim(filter_input(INPUT_POST, 'query'));

$r = array();
$x = 0;

$sql = 'SELECT EMBARQUES.ID, EMBARQUES.LOCAL, EMBARQUES.SALDO, EMBARQUES.OBSERVACAO, MUNICIPIOS.CODIGO AS COD_MUNICIPIO, MUNICIPIOS.NOME, PRODUTOS.CODIGO AS PRODUTO '
        . 'FROM ((EMBARQUES '
        . 'INNER JOIN MUNICIPIOS ON EMBARQUES.COD_MUNICIPIO = MUNICIPIOS.CODIGO) '
        . 'INNER JOIN PRODUTOS ON EMBARQUES.COD_PRODUTO = PRODUTOS.CODIGO) '
        . 'WHERE (EMBARQUES.LOCAL LIKE "%' . $query . '%" OR MUNICIPIOS.NOME LIKE "%' . $query . '%")';
$res = $con->query($sql);

while ($row = $res->fetch_assoc()) {
    $r[$x]['value'] = $row['ID'];
    $r[$x]['label'] = $row['LOCAL'].' - '.$row['NOME'];
    $r[$x]['local'] = $row['LOCAL'];
    $r[$x]['produto'] = $row['PRODUTO'];
    $r[$x]['saldo'] = $row['SALDO'];
    $r[$x]['obs'] = $row['OBSERVACAO'];
    $r[$x]['codmun'] = $row['COD_MUNICIPIO'];
    $r[$x]['nomemun'] = $row['NOME'];
    $x++;
}

echo json_encode($r);
$con->close();
