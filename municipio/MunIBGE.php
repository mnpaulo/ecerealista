<?php

$q = str_replace(' ', '-', trim(filter_input(INPUT_POST, 'query')));

$r = array();

$ibge = json_decode(file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/municipios/' . $q . '?orderBy=nome'));
for ($x = 0; $x < count($ibge); $x++) {
    $r[$x]['value'] = $ibge[$x]->id;
    $r[$x]['label'] = $ibge[$x]->nome . '-' . $ibge[$x]->microrregiao->mesorregiao->UF->sigla;
    $r[$x]['nome'] = $ibge[$x]->nome;
    $r[$x]['uf'] = $ibge[$x]->microrregiao->mesorregiao->UF->sigla;
}

echo json_encode($r);
