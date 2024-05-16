<?php

include '../bd/conecta.php';
include '../util.php';

$campos = array();
foreach (filter_input_array(INPUT_POST, FILTER_DEFAULT) as $k => $v) {
    switch ($k) {
        case 'ID':
            $campos['id'] = $v;
            break;
        case 'radio-cpf-cnpj':
            $campos['pf-pj'] = $v;
            break;
        case 'cpf-cnpj':
            $campos['cpf-cnpj'] = preg_replace('/\D/', '', $v);
            break;
        case 'ie':
            $campos['ie'] = $v;
            break;
        case 'razao-social':
            $campos['razao-social'] = trim($v);
            break;
        case 'nome-fantasia':
            $campos['nome-fantasia'] = trim($v);
            break;
        case 'dados-ban':
            if (empty(trim($v))) {
                $campos['dban'] = 'NULL';
            } else {
                $campos['dban'] = '"' . trim($v) . '"';
            }
            break;
        case 'cod-mun':
            $campos['cod-mun'] = $v;
            break;
    }
}

if (empty($campos['id'])) {
    try {
        $sql = 'INSERT INTO PESSOAS (CPF_CNPJ, IE, TIPO, RAZAO_SOCIAL, NOME_FANTASIA, DADOS_BAN, CODIGO_MUNICIPIO) VALUES ("'
                . $campos['cpf-cnpj'] . '", "'
                . $campos['ie'] . '", "'
                . $campos['pf-pj'] . '", "'
                . $campos['razao-social'] . '", "'
                . $campos['nome-fantasia'] . '", '
                . $campos['dban'] . ', "'
                . $campos['cod-mun'] . '")';
        $con->query($sql);
        echo 'I';
    } catch (Exception $e) {
        echo 'EI';
    }
} else {
    try {
        $sql = 'UPDATE PESSOAS SET '
                . 'CPF_CNPJ = "' . $campos['cpf-cnpj'] . '", '
                . 'IE = "' . $campos['ie'] . '", '
                . 'TIPO = "' . $campos['pf-pj'] . '", '
                . 'RAZAO_SOCIAL = "' . $campos['razao-social'] . '", '
                . 'NOME_FANTASIA = "' . $campos['nome-fantasia'] . '", '
                . 'DADOS_BAN = ' . $campos['dban'] . ', '
                . 'CODIGO_MUNICIPIO = "' . $campos['cod-mun'] . '" '
                . 'WHERE ID = ' . $campos['id'];
        $con->query($sql);
        echo 'A';
    } catch (Exception $e) {
        echo 'EA';
    }
}

$con->close();
