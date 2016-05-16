<?php
include("conexion.php");
$doc = $_GET["q"];
if($_GET["acc"] == "i"){
$consulta=mysql_fetch_array(mysql_query("SELECT id_producto FROM producto WHERE codigo_barra = '$doc'"));
$id=$consulta['id_producto'];
}
else if($_GET["acc"] == "f"){
	$consulta=mysql_fetch_array(mysql_query("SELECT id_cliente FROM cliente WHERE documento = '$doc'"));
	$id=$consulta['id_producto'];
}
echo $id;
?>