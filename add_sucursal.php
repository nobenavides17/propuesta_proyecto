<?php 
require("header.php");
require("conexion.php");
?>
<div>
	<h4>Nueva Sucursal</h4>
	<table>		
	<form method="POST">
	<tr>
		<td>
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre de la Sucursal" >
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="direccion" class="form-control" required  placeholder="Direccion de la Sucursal" >
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="telefono" class="form-control" required  placeholder="Telefono" >
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
	$query=mysql_query("INSERT INTO sucursal(id_sucursal, nombre,direccion,telefono) VALUES (NULL, '$_POST[nombre]',
		'$_POST[direccion]', '$_POST[telefono]')");
	if($query)
	{
		echo "<script>location.replace('admin_sucursal.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}
require("fotter.php");
?>