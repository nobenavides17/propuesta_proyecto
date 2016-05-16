<?php
$server="localhost"; //Por default 
$user="root";       //El usuario de la base de datos no usar root salvo para pruebas 
$pass="12345678";         //Clave del usuario que se conectara con la base de datos 
$db="db_compra-venta";
$conn = mysql_connect($server,$user,$pass); 
	if ($conn == false) {
		echo "Error: No se puede conectar al servidor".mysqli_connect_error();
		exit;
	}
	
	if (mysql_select_db($db, $conn) == false) {
		echo "Error: No se puede conectar a la base de datos".mysql_error();
		exit;
	}	
 ?>
