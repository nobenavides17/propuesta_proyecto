<?php
include("conexion.php");
$doc = $_GET["q"];
$consulta=mysql_fetch_array(mysql_query("SELECT id_producto FROM producto WHERE codigo_barra = '$doc'"));
$consu=mysql_fetch_array(mysql_query("SELECT precio, cantidad FROM inventario WHERE id_producto = '$consulta[id_producto]'"));
$id=$consulta['id_producto'].":".$consu['precio'].":".$consu['cantidad'];
echo $id;
?>