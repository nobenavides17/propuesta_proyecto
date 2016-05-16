<?php 
require("header.php");
require("conexion.php");
?>
<div>
	<h4>Nuevo Proveedor</h4>
	<table>		
	<form method="POST">
	<tr>
		<td>
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre del Proveedor" >
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="direccion" class="form-control" required  placeholder="Direccion del Proveedor" >
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
	$query=mysql_query("INSERT INTO proveedor(id_proveedor, nombre,direccion,telefono) VALUES (NULL, '$_POST[nombre]',
		'$_POST[direccion]', '$_POST[telefono]')");
	if($query)
	{
		echo "<script>location.replace('admin_prov.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}
require("fotter.php");
?>