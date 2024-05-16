<?php

include '../bd/conecta.php';

$query = trim(filter_input(INPUT_POST, 'query'));

$sql = 'SELECT * FROM CONJUNTOS WHERE PLACA_TRACAO LIKE "%' . $query . '%"';

$res = $con->query($sql);

$r = array();
$x = 0;

while ($row = $res->fetch_assoc()) {
    $r[$x]['value'] = $r[$x]['label'] = $row['PLACA_TRACAO'];
    //CAMPOS DO FORMULARIO
    $r[$x]['reb1'] = $row['PLACA_REB_1'];
    $r[$x]['reb2'] = $row['PLACA_REB_2'];
    $r[$x]['reb3'] = $row['PLACA_REB_3']; 
    $r[$x]['tip'] = $row['TIPO'];
    $r[$x]['pes'] = $row['PESO_AGD'];
    $x++;
}

echo json_encode($r);
$con->close();
