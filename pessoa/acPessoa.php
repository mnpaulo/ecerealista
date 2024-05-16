<?php

include '../bd/conecta.php';

$query = trim(filter_input(INPUT_POST, 'query'));

$sql = 'SELECT * FROM PESSOAS INNER JOIN MUNICIPIOS ON PESSOAS.CODIGO_MUNICIPIO = MUNICIPIOS.CODIGO WHERE PESSOAS.CPF_CNPJ LIKE "%' . $query . '%" OR PESSOAS.RAZAO_SOCIAL LIKE "%' . $query . '%" OR PESSOAS.NOME_FANTASIA LIKE "%' . $query . '%" OR MUNICIPIOS.NOME LIKE "%' . $query . '%"';

$res = $con->query($sql);

$r = array();
$x = 0;

while ($row = $res->fetch_assoc()) {
    $r[$x]['value'] = $row['ID'];
    $r[$x]['label'] = $row['RAZAO_SOCIAL'] . '<br>' . $row['NOME'] . '-' . $row['UF'];
    //CAMPOS DO FORMULARIO
    $r[$x]['cpfcnpj'] = $row['CPF_CNPJ'];
    $r[$x]['ie'] = $row['IE'];
    $r[$x]['tipo'] = $row['TIPO'];
    $r[$x]['razao'] = $row['RAZAO_SOCIAL'];
    $r[$x]['fant'] = $row['NOME_FANTASIA'];
    $r[$x]['dban'] = $row['DADOS_BAN'];
    $r[$x]['cod'] = $row['CODIGO'];
    $r[$x]['nome'] = $row['NOME'];
    $r[$x]['uf'] = $row['UF'];
    $x++;
}

echo json_encode($r);
$con->close();
