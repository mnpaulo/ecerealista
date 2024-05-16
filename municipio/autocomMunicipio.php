<?php

include '../bd/conecta.php';

$query = trim(filter_input(INPUT_POST, 'query'));
$UF = trim(filter_input(INPUT_POST, 'uf'));

$r = array();
$x = 0;

if (!empty($UF)) {
    $sql = 'SELECT * FROM MUNICIPIOS WHERE UF = "' . $UF . '" AND NOME LIKE "%' . $query . '%"';
    $res = $con->query($sql);

    while ($row = $res->fetch_assoc()) {
        $r[$x]['value'] = $row['CODIGO'];
        $r[$x]['label'] = $row['NOME'];
        $x++;
    }
} else {
    $sql = 'SELECT * FROM MUNICIPIOS WHERE NOME LIKE "%' . $query . '%"';
    $res = $con->query($sql);

    while ($row = $res->fetch_assoc()) {
        $r[$x]['value'] = $row['CODIGO'];
        $r[$x]['label'] = $row['NOME'] . ' - ' . $row['UF'];
        $r[$x]['nome'] = $row['NOME'];
        $r[$x]['uf'] = $row['UF'];
        $x++;
    }
}

echo json_encode($r);
$con->close();
