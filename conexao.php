<?php
/*
if ($lang == 1) {
  $server  = "187.45.196.238";
  $usuario = "papilloneventos1";
  $banco   = "papilloneventos1";
}
else {
  $server  = "187.45.196.160";
  $usuario = "papillonevento1";
  $banco   = "papillonevento1";
}
$senha   = "pap14333";
*/
$server  = "localhost";
$usuario = "root";
$senha   = "";
$banco   = "papilloneventos1";

$con    = mysql_connect($server, $usuario, $senha) or die ("Erro: " . mysql_error());
$dbase  = mysql_select_db($banco) or die ("Erro: " . mysql_error($con));
?>