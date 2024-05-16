<?php

//iniciar a sessao
session_start();

$senha = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING)['Senha'];

switch (sha1($senha)) {
    case 'bf9a882a1b07f7254f00f31361afe3b44cc09a23':
        //guardar dados na sessao
        $_SESSION['usuario'] = 'Laira';
        header("Location:admin.php");
        break;
    default:
        echo '<script>alert("Senha incorreta!"); history.back();</script>';
        break;
}