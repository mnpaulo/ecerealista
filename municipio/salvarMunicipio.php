<?php

include '../bd/conecta.php';

$campos = array();
foreach (filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW) as $k => $v) {
    switch ($k) {
        case 'codigo':
            $campos['cod'] = $v;
            break;
        case 'nome':
            $campos['nom'] = $v;
            break;
        case 'uf':
            $campos['uf'] = $v;
            break;
    }
}
try {
    $sql = 'INSERT INTO MUNICIPIOS VALUES ("'
            . $campos['cod'] . '", "'
            . $campos['nom'] . '", "'
            . $campos['uf'] . '")';
    $con->query($sql);
    echo 'I';
} catch (Exception $e) {
    echo 'E';
}

$con->close();
