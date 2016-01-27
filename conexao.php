<?php
/*
$server  = "187.45.196.238";
$usuario = "papilloneventos1";
$senha   = "pap14333";
$banco   = "papilloneventos1";
*/
$server  = "localhost";
$usuario = "root";
$senha   = "";
$banco   = "papilloneventos1";

$con    = mysql_connect($server, $usuario, $senha) or die ("Erro: " . mysql_error());
$dbase  = mysql_select_db($banco) or die ("Erro: " . mysql_error($con));
?>