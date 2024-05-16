<?php

include '../bd/conecta.php';

$query = trim(filter_input(INPUT_POST, 'query'));

$sql = 'SELECT * FROM MUNICIPIOS WHERE NOME LIKE "%' . $query . '%"';
$res = $con->query($sql);

$r = array();
$x = 0;

while ($row = $res->fetch_assoc()) {
    $r[$x]['value'] = $row['CODIGO'];
    $r[$x]['label'] = $row['NOME'] . ' - ' . $row['UF'];
    $r[$x]['nome'] = $row['NOME'];
    $r[$x]['uf'] = $row['UF'];
    $x++;
}

echo json_encode($r);
$con->close();
