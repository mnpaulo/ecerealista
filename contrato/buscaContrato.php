<?php

include '../bd/conecta.php';

$id = trim(filter_input(INPUT_POST, 'idContrato'));
$idEmb = trim(filter_input(INPUT_POST, 'idemb'));
$idDes = trim(filter_input(INPUT_POST, 'iddes'));

$sql = 'SELECT CONTRATOS.ID, CONTRATOS.TIPO, CONTRATOS.NUMERO, PESSOAS.ID AS ID_PESSOA, PESSOAS.NOME_FANTASIA, MUNICIPIOS.NOME, MUNICIPIOS.UF '
        . 'FROM ((CONTRATOS '
        . 'INNER JOIN PESSOAS ON IFNULL(CONTRATOS.ID_PES_RET_ENT, CONTRATOS.ID_PESSOA) = PESSOAS.ID) '
        . 'INNER JOIN MUNICIPIOS ON PESSOAS.CODIGO_MUNICIPIO = MUNICIPIOS.CODIGO) '
        . 'WHERE CONTRATOS.ID =' . $id;

$res = $con->query($sql);
$row = $res->fetch_assoc();

$r = array();
$r['id'] = $row['ID'];
$r['idloc'] = $row['ID_PESSOA'];
$r['tipo'] = $row['TIPO'];
$r['local'] = $row['NOME_FANTASIA'];
$r['ctr'] = $row['NUMERO'];
$r['municipio'] = $row['NOME'];
$r['uf'] = $row['UF'];

$con->close();

if ($idEmb == '' && $idDes == '') {
    echo json_encode($r);
} else {
    switch ($r['tipo']) {
        case 'C':
            if ($idEmb != $r['idloc'] && $idEmb != '') {
                header('HTTP/1.1 500'); //codigo do erro 
                die('Selecione um contrato de <strong>compra</strong> do mesmo local!'); //mensagem do erro
            } else {
                echo json_encode($r);
            }
            break;

        case 'V':
            if ($idDes != $r['idloc'] && $idDes != '') {
                header('HTTP/1.1 500'); //codigo do erro 
                die('Selecione um contrato de <strong>venda</strong> para o mesmo local!'); //mensagem do erro       
            } else {
                echo json_encode($r);
            }
            break;
    }
}