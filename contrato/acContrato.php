<?php

include '../bd/conecta.php';
include '../util.php';

$query = trim(filter_input(INPUT_POST, 'query'));

$sql = 'SELECT 
    c.ID, c.NUMERO, c.DATA, c.DATA_ENTREGA, c.TIPO, c.MOD_FRETE, c.ID_PESSOA, c.ID_PES_RET_ENT, c.CODIGO_PRODUTO, c.QUANTIDADE_KG, c.PRECO_SC, c.UMI, c.IMP, c.ARD, c.OBS_CLASS, c.FORMA_PAG, c.DADOS_BAN, c.OBS, c.STATUS, 
    p1.CPF_CNPJ AS DOC1, p1.RAZAO_SOCIAL AS RAZAO1, p1.NOME_FANTASIA AS LOCAL1, p1.CODIGO_MUNICIPIO AS COD_MUN1, 
    p2.CPF_CNPJ AS DOC2, p2.RAZAO_SOCIAL AS RAZAO2, p2.NOME_FANTASIA AS LOCAL2, p2.CODIGO_MUNICIPIO AS COD_MUN2, 
    m1.NOME AS NOME1, m1.UF AS UF1, m2.NOME AS NOME2, m2.UF AS UF2 
    FROM CONTRATOS AS c 
    INNER JOIN PESSOAS AS p1 ON c.ID_PESSOA = p1.ID 
    LEFT JOIN PESSOAS AS p2 ON c.ID_PES_RET_ENT = p2.ID 
    INNER JOIN MUNICIPIOS AS m1 ON p1.CODIGO_MUNICIPIO = m1.CODIGO 
    LEFT JOIN MUNICIPIOS AS m2 ON p2.CODIGO_MUNICIPIO = m2.CODIGO 
    WHERE c.NUMERO LIKE "%' . $query . '%" OR 
    p1.CPF_CNPJ LIKE "%' . $query . '%" OR 
    p1.RAZAO_SOCIAL LIKE "%' . $query . '%" OR 
    p1.NOME_FANTASIA LIKE "%' . $query . '%" OR 
    m1.NOME LIKE "%' . $query . '%" OR 
    p2.CPF_CNPJ LIKE "%' . $query . '%" OR 
    p2.RAZAO_SOCIAL LIKE "%' . $query . '%" OR 
    p2.NOME_FANTASIA LIKE "%' . $query . '%" OR 
    m2.NOME LIKE "%' . $query . '%"';

$res = $con->query($sql);

$r = array();
$x = 0;

while ($row = $res->fetch_assoc()) {
    $r[$x]['value'] = $row['ID'];

    if ($row['ID_PES_RET_ENT'] == null) {
        $loc = $row['LOCAL1'];
        $mun = $row['NOME1'] . '-' . $row['UF1'];
    } else {
        $loc = $row['LOCAL2'];
        $mun = $row['NOME2'] . '-' . $row['UF2'];
    }
    $row['CODIGO_PRODUTO'] == '53218' ? $pro = 'MILHO' : $pro = 'SOJA';
    $r[$x]['label'] = $row['NUMERO'] . '<br>' .
            $row['RAZAO1'] . '<br>' .
            $loc . '<br>' .
            $mun . '<br>' .
            $pro . ' | ' . number_format($row['QUANTIDADE_KG'], 0, ',', '.') . ' KG | R$ ' . str_replace('.', ',', $row['PRECO_SC']);
    //CAMPOS DO FORMULARIO
    $r[$x]['sta'] = $row['STATUS'];
    $r[$x]['num'] = $row['NUMERO'];
    $r[$x]['tip'] = $row['TIPO'];
    $r[$x]['mod'] = $row['MOD_FRETE'];
    $r[$x]['dat'] = dataSQLparaBR($row['DATA']);
    $r[$x]['date'] = dataSQLparaBR($row['DATA_ENTREGA']);

    $r[$x]['id1'] = $row['ID_PESSOA'];
    $r[$x]['doc1'] = $row['DOC1'];
    $r[$x]['raz1'] = $row['RAZAO1'];
    $r[$x]['loc1'] = $row['LOCAL1'];
    $r[$x]['nom1'] = $row['NOME1'];
    $r[$x]['uf1'] = $row['UF1'];
    
    if ($row['ID_PES_RET_ENT'] != null) {
        $r[$x]['id2'] = $row['ID_PES_RET_ENT'];
        $r[$x]['doc2'] = $row['DOC2'];
        $r[$x]['raz2'] = $row['RAZAO2'];
        $r[$x]['loc2'] = $row['LOCAL2'];
        $r[$x]['nom2'] = $row['NOME2'];
        $r[$x]['uf2'] = $row['UF2'];
    }
    
    $r[$x]['pro'] = $row['CODIGO_PRODUTO'];
    $r[$x]['qua'] = number_format($row['QUANTIDADE_KG'], 0, ',', '.');
    $r[$x]['pre'] = str_replace('.', ',', $row['PRECO_SC']);
    $r[$x]['umi'] = $row['UMI'];
    $r[$x]['imp'] = $row['IMP'];
    $r[$x]['ard'] = $row['ARD'];
    $r[$x]['ocla'] = $row['OBS_CLASS'];
    $r[$x]['pag'] = $row['FORMA_PAG'];
    $r[$x]['ban'] = $row['DADOS_BAN'];
    $r[$x]['obs'] = $row['OBS'];
    
    $x++;
}

echo json_encode($r);
$con->close();
