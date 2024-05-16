<?php

function dataBRparaSQL($d) {
    $data = str_replace('/', '-', $d);
    return date('Y-m-d', strtotime($data));
}

function dataSQLparaBR($d) {
    $data = str_replace('-', '/', $d);
    return date('d/m/Y', strtotime($data));
}

function checarVazio($p) {
    if ($p == '') {
        return null;
    } else {
        return $p;
    }
}