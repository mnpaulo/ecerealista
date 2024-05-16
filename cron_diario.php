<?php

include 'bd/conecta.php';
include 'util.php';
require __DIR__ . '/vendor/autoload.php';

use HeadlessChromium\BrowserFactory;
use HeadlessChromium\Exception\OperationTimedOut;
use HeadlessChromium\Exception\NavigationExpired;

date_default_timezone_set("America/Campo_Grande");

$browserFactory = new BrowserFactory();

// starts headless Chrome
$browser = $browserFactory->createBrowser(['userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36']);

for ($x = 0; $x < 3; $x++) {

    try {
        $codigo = '53218';
        // creates a new page and navigate to an URL
        $page = $browser->createPage();
        $page->navigate('https://servicos.efazenda.ms.gov.br/consultavalor')->waitForNavigation();

        sleep(5);

        $elem = $page->dom()->querySelector('#codigo');
        $elem->sendKeys($codigo);
        try {
            $page->mouse()->find("button[type='submit']")->click();
            $page->waitForReload();

            sleep(5);

            $pauta = $page->dom()->querySelector('tbody tr td:nth-child(10) table tbody tr')->querySelectorAll('td');
//            echo $pauta[2]->getText();
//            echo '<br>' . date('d/m/Y H:i');
            $p = str_replace(',', '.', substr($pauta[2]->getText(), 2));
            $sql = 'UPDATE PRODUTOS SET PAUTA = ' . $p . ', DATA_PAUTA = "' . date('Y-m-d H:i:s') . '" WHERE CODIGO = "' . $codigo . '"';

            $con->query($sql);
//        $page->screenshot()->saveToFile('print.png');
//        echo '<img src="print.png">';
        } catch (OperationTimedOut $e) {
            // too long to load
            continue;
//            echo $e->getMessage();
        } catch (NavigationExpired $e) {
            // An other page was loaded
            continue;
//            echo $e->getMessage();
        }

        unset($codigo, $page, $elem, $pauta, $p);

        $codigo = '17625';
        // creates a new page and navigate to an URL
        $page = $browser->createPage();
        $page->navigate('https://servicos.efazenda.ms.gov.br/consultavalor')->waitForNavigation();

        sleep(5);

        $elem = $page->dom()->querySelector('#codigo');
        $elem->sendKeys($codigo);
        try {
            $page->mouse()->find("button[type='submit']")->click();
            $page->waitForReload();

            sleep(5);

            $pauta = $page->dom()->querySelector('tbody tr td:nth-child(10) table tbody tr')->querySelectorAll('td');
//            echo $pauta[2]->getText();
//            echo '<br>' . date('d/m/Y H:i');

            $p = str_replace(',', '.', substr($pauta[2]->getText(), 2));
            $sql = 'UPDATE PRODUTOS SET PAUTA = ' . $p . ', DATA_PAUTA = "' . date('Y-m-d H:i:s') . '" WHERE CODIGO = "' . $codigo . '"';

            $con->query($sql);
            $con->close();
            break;
//        $page->screenshot()->saveToFile('print.png');
//        echo '<img src="print.png">';
        } catch (OperationTimedOut $e) {
            // too long to load
            continue;
        } catch (NavigationExpired $e) {
            // An other page was loaded
            continue;
        }
    } finally {
        // close browser
        $browser->close();
    }
}