<?php

include '../bd/conecta.php';
include '../util.php';

$data = dataBRparaSQL(filter_input(INPUT_POST, 'dia'));

$sql = 'DELETE FROM FRETES WHERE DATA = "' . $data . '"';
$con->query($sql);

if ($con->affected_rows > 0) {
    echo 'ok';
} else {
    echo 'erro';
}

$con->close();
