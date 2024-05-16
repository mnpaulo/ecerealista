<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require __DIR__ . '/vendor/autoload.php';

use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;

$arr = [
    "atualizacao" => '2024-01-16 10:00:00',
    "tpAmb" => 2,
    "razaosocial" => 'MABOL COMERCIO DE CEREAIS LTDA',
    "cnpj" => '70390869000175',
    "siglaUF" => 'MS',
    "schemes" => 'PL_009_V4',
    "versao" => '4.00',
    "tokenIBPT" => 'AAAAAAA',
    "CSC" => 'GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G',
    "CSCid" => '000001',
    "proxyConf" => [
        "proxyIp" => "",
        "proxyPort" => "",
        "proxyUser" => "",
        "proxyPass" => ""
    ]
];

//carrega o conteudo do certificado.
$content = file_get_contents('cfg/cert.pfx');

try {
    $tools = new Tools(json_encode($arr), Certificate::readPfx($content, 'serasa12'));
    $tools->model('55');
    $response = $tools->sefazStatus('MS');

    $stdCl = new Standardize($response);
    //nesse caso o $json irá conter uma representação em JSON do XML
    echo $stdCl->toJson();
} catch (\Exception $e) {
    echo $e->getMessage();
}