<?php

include '../bd/conecta.php';
include '../util.php';

$campos = array();
foreach (filter_input_array(INPUT_POST, FILTER_DEFAULT) as $k => $v) {
    switch ($k) {
        case 'ID':
            $campos['id'] = $v;
            break;
        case 'numero':
            $campos['num'] = trim($v);
            break;
        case 'data':
            $campos['data'] = dataBRparaSQL($v);
            break;
        case 'emb-data':
            $campos['data-ent'] = dataBRparaSQL($v);
            break;
        case 'radio-compra-venda':
            $campos['tipo'] = $v;
            break;
        case 'radio-fob-cif':
            $campos['mod-frete'] = $v;
            break;
        case 'cod-for-cli':
            $campos['for-cli'] = $v;
            break;
        case 'cod-ent-ret':
            if (empty($v)) {
                $campos['ent-ret'] = 'NULL';
            } else {
                $campos['ent-ret'] = $v;
            }
            break;
        case 'produto':
            $campos['prod'] = $v;
            break;
        case 'quantidade':
            $campos['qtd'] = str_replace('.', '', $v);
            break;
        case 'preco':
            $campos['preco'] = str_replace(',', '.', $v);
            break;
        case 'umi':
            $campos['umi'] = $v;
            break;
        case 'imp':
            $campos['imp'] = $v;
            break;
        case 'ard':
            $campos['ard'] = $v;
            break;
        case 'obs-clas':
            if (empty(trim($v))) {
                $campos['obs-clas'] = 'NULL';
            } else {
                $campos['obs-clas'] = '"' . trim($v) . '"';
            }
            break;
        case 'forma-pag':
            $campos['forma-pag'] = $v;
            break;
        case 'dados-ban':
            $campos['dados-ban'] = $v;
            break;
        case 'obs':
            if (empty(trim($v))) {
                $campos['obs'] = 'NULL';
            } else {
                $campos['obs'] = '"' . trim($v) . '"';
            }
            break;
        case 'r-status':
            $campos['status'] = $v;
            break;
    }
}

if (empty($campos['id'])) {
    try {
        $sql = 'INSERT INTO CONTRATOS (NUMERO, DATA, DATA_ENTREGA, TIPO, MOD_FRETE, ID_PESSOA, ID_PES_RET_ENT, CODIGO_PRODUTO, QUANTIDADE_KG, PRECO_SC, UMI, IMP, ARD, OBS_CLASS, FORMA_PAG, DADOS_BAN, OBS) VALUES ("'
                . $campos['num'] . '", "'
                . $campos['data'] . '", "'
                . $campos['data-ent'] . '", "'
                . $campos['tipo'] . '", "'
                . $campos['mod-frete'] . '", '
                . $campos['for-cli'] . ', '
                . $campos['ent-ret'] . ', "'
                . $campos['prod'] . '", '
                . $campos['qtd'] . ', '
                . $campos['preco'] . ', '
                . $campos['umi'] . ', '
                . $campos['imp'] . ', '
                . $campos['ard'] . ', '
                . $campos['obs-clas'] . ', "'
                . $campos['forma-pag'] . '", "'
                . $campos['dados-ban'] . '", '
                . $campos['obs'] . ')';
        $con->query($sql);

        //ALTERA NUMERO NO JSON DO NUMERO
        $js = json_decode(file_get_contents('numero.json'), true);
        $campos['num'] = str_replace('-' . date('Y'), '', $campos['num']);
        if ($js['numero'] == $campos['num']) {
            $js['numero']++;
            file_put_contents('numero.json', json_encode($js));
        }

        echo 'I';
    } catch (Exception $e) {
        echo 'EI';
    }
} else {
    try {
        $sql = 'UPDATE CONTRATOS SET '
                . 'NUMERO = "' . $campos['num'] . '", '
                . 'DATA = "' . $campos['data'] . '", '
                . 'DATA_ENTREGA = "' . $campos['data-ent'] . '", '
                . 'TIPO = "' . $campos['tipo'] . '", '
                . 'MOD_FRETE = "' . $campos['mod-frete'] . '", '
                . 'ID_PESSOA = ' . $campos['for-cli'] . ', '
                . 'ID_PES_RET_ENT = ' . $campos['ent-ret'] . ', '
                . 'CODIGO_PRODUTO = "' . $campos['prod'] . '", '
                . 'QUANTIDADE_KG = ' . $campos['qtd'] . ', '
                . 'PRECO_SC = ' . $campos['preco'] . ', '
                . 'UMI = ' . $campos['umi'] . ', '
                . 'IMP = ' . $campos['imp'] . ', '
                . 'ARD = ' . $campos['ard'] . ', '
                . 'OBS_CLASS = ' . $campos['obs-clas'] . ', '
                . 'FORMA_PAG = "' . $campos['forma-pag'] . '", '
                . 'DADOS_BAN = "' . $campos['dados-ban'] . '", '
                . 'OBS = ' . $campos['obs'] . ', '
                . 'STATUS = "' . $campos['status'] . '" '
                . 'WHERE ID = ' . $campos['id'];
        $con->query($sql);
        echo 'A';
    } catch (Exception $e) {
        echo 'EA';
    }
}
$con->close();
