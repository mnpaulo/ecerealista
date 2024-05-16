<?php

include '../bd/conecta.php';

if (filter_input_array(INPUT_POST)['ativo'] == 'true') {
    $ativo = 'A';
} else {
    $ativo = 'I';
}

$termo;
if (array_key_exists('termo', filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW))) {
    $v = trim(filter_input_array(INPUT_POST)['termo']);
    $termo = ' (EMBARQUES.LOCAL LIKE "%' . $v . '%" OR MUNICIPIOS.NOME LIKE "%' . $v . '%") AND';
} else {
    $termo = null;
}

$sql = 'SELECT EMBARQUES.ID, EMBARQUES.LOCAL, MUNICIPIOS.NOME '
        . 'FROM EMBARQUES INNER JOIN MUNICIPIOS '
        . 'ON MUNICIPIOS.CODIGO = EMBARQUES.COD_MUNICIPIO '
        . 'WHERE' . $termo . ' EMBARQUES.STATUS = "' . $ativo . '" '
        . 'LIMIT 15';
$res = $con->query($sql);

$html = null;
while ($r = $res->fetch_assoc()) {
    $html .= '<tr>'
            . '<td>' . $r['LOCAL'] . ' — ' . $r['NOME'] . '</td>'
            . '</tr>';
}

$res->free_result();

echo $html;
