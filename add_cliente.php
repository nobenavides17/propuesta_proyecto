<?php 
require("header.php");
require("conexion.php");
?>
<div>
	<h4>Nuevo Cliente</h4>
	<table>		
	<form method="POST">
	<tr>
		<td>
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre del Cliente" >
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="documento" class="form-control" required  placeholder="N de documento" >
		</td>
	</tr>
	<tr>
		<td>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</td>
	</tr>
</form>
</table>
</div>
<?php 
if($_POST)
{
	$query=mysql_query("INSERT INTO cliente(id_cliente, nombre, documento) VALUES (NULL, '$_POST[nombre]','$_POST[documento]')");
	if($query)
	{
		echo "<script>location.replace('admin_cliente.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}
require("fotter.php");
?>