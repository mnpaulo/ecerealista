<?php
//conectar no banco de dados
$host = 'localhost';
$user = 'root';
$pass = '0161281126';
$db = 'ecerealista';

// Create connection
$con = new mysqli($host, $user, $pass, $db);
$con->set_charset('UTF8');
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}