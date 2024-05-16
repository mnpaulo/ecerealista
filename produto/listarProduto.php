<?php

include '../bd/conecta.php';

$sql = 'SELECT CODIGO, DESCRICAO FROM PRODUTOS ORDER BY DESCRICAO';

$res = $con->query($sql);

$r = array();
$x = 0;
while ($row = $res->fetch_assoc()) {
    $r[$x]['codigo'] = $row['CODIGO'];
    $r[$x]['descricao'] = $row['DESCRICAO'];
    $x++;
}
echo json_encode($r);

$con->close();
