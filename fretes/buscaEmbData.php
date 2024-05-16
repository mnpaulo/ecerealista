<?php

include '../bd/conecta.php';
include '../util.php';

$data = dataBRparaSQL(filter_input(INPUT_POST, 'data'));

$sql = 'SELECT DISTINCT FRETES.ID_EMBARQUE, EMBARQUES.LOCAL FROM FRETES INNER JOIN EMBARQUES ON EMBARQUES.ID = FRETES.ID_EMBARQUE WHERE DATA = "' . $data . '"';
$res = $con->query($sql);

$r = array();
$x = 0;
while ($row = $res->fetch_assoc()) {
    $r[$x]['codigo'] = $row['ID_EMBARQUE'];
    $r[$x]['local'] = $row['LOCAL'];
    $x++;
}

echo json_encode($r);
$con->close();
