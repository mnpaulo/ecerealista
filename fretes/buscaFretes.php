<?php

include '../bd/conecta.php';
include '../util.php';

$data = filter_input(INPUT_POST, 'data');

$sql = 'SELECT DISTINCT PRODUTOS.CODIGO, PRODUTOS.DESCRICAO '
        . 'FROM ((EMBARQUES '
        . 'INNER JOIN PRODUTOS ON PRODUTOS.CODIGO = EMBARQUES.COD_PRODUTO) '
        . 'INNER JOIN FRETES ON FRETES.ID_EMBARQUE = EMBARQUES.ID) '
        . 'WHERE FRETES.DATA = "'.dataBRparaSQL($data).'" '
        . 'ORDER BY PRODUTOS.DESCRICAO';
$res = $con->query($sql);

if ($res->num_rows > 0) {
    $produtos = array();
    while ($row = $res->fetch_assoc()) {
        $produtos[$row['CODIGO']] = $row['DESCRICAO'];
    }
    $res->free_result();

    $html = '<div class="row mt-1"><div class="col text-center"><h2>Fretes Mabol - Dia '.$data.'</h2></div></div>';
    
    foreach ($produtos as $cod => $des) {   
    
        $html .= '<div class="row mt-2"><div class="col text-center"><h6>' . $des . '</h6></div></div>';
        $html .= '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-2">';
        $sql = 'SELECT DISTINCT MUNICIPIOS.NOME, EMBARQUES.ID, EMBARQUES.LOCAL, EMBARQUES.SALDO, EMBARQUES.OBSERVACAO '
                . 'FROM ((EMBARQUES '
                . 'INNER JOIN MUNICIPIOS ON MUNICIPIOS.CODIGO = EMBARQUES.COD_MUNICIPIO) '
                . 'INNER JOIN FRETES ON FRETES.ID_EMBARQUE = EMBARQUES.ID) '
                . 'WHERE EMBARQUES.COD_PRODUTO = "'.$cod.'" AND FRETES.DATA = "'.dataBRparaSQL($data).'" '
                . 'ORDER BY MUNICIPIOS.NOME';
        $res = $con->query($sql);

            $embarques = array();
            while ($row = $res->fetch_assoc()) {
                $embarques[] = $row;
            }
            $res->free_result();

            foreach ($embarques as $v) {

                $html .= '<div class="col">
                            <div class="card border-dark">
                                <div class="card-header text-center p-0">
                                    ' . $v['NOME'] . ' <i class="bi-arrow-right"></i> ' . $v['LOCAL'] . '
                                </div>
                                <ul class="list-group list-group-flush">';

                                    $sql = 'SELECT MUNICIPIOS.NOME, MUNICIPIOS.UF, FRETES.VALOR FROM FRETES INNER JOIN MUNICIPIOS ON MUNICIPIOS.CODIGO = FRETES.COD_MUNICIPIO WHERE FRETES.ID_EMBARQUE = ' . $v['ID'] . ' AND FRETES.DATA = "'.dataBRparaSQL($data).'" ORDER BY FIELD(MUNICIPIOS.UF, "MS", "PR", "SC", "RS")';
                                    $res = $con->query($sql);

                                    $fretes = array();
                                    while ($row = $res->fetch_assoc()) {
                                        $fretes[] = $row;
                                    }
                                    foreach ($fretes as $ar) {                                   
                                        $html .= '<li class="list-group-item d-flex justify-content-between align-items-center pe-1 ps-2 py-1">
                                            ' . $ar['NOME'] . '-' . $ar['UF'] . '
                                            <span class="badge bg-primary rounded-pill">' . $ar['VALOR'] . '</span>
                                        </li>';
                                    }
                                    $res->free_result();                               

                        $html .= '</ul>';

                $saldo = $v['SALDO'] . ' TON';
                $obs = $v['OBSERVACAO'];
                if ($v['SALDO'] == null) {
                    $saldo = 'N/D';
                }
                if ($v['OBSERVACAO'] == null) {
                    $obs = 'N/D';
                }
                            $html .= '<div class="card-footer text-secondary p-1">
                                    Saldo: ' . $saldo . '<br>
                                    Obs.: '.$obs.'    
                                    </div>
                                </div>
                        </div>';

            }   
                $html .= '</div>';
    }
    $js = json_decode(file_get_contents('datas.json'), true);
    $html .= '<p class="text-secondary text-end mt-2">Atualizado em: '.$js['atualizacao'].'</p>';
    echo $html;
} else {
    echo '<div class="alert alert-danger text-center" role="alert"><i class="bi-exclamation-triangle-fill"></i> Desculpe, não temos fretes para este dia no momento!</div>';
}

$con->close();
