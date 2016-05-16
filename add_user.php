<?php 
require("header.php");
require("conexion.php");
?>
<div>
	<h4>Nuevo Usuario</h4>
	<table>		
	<form method="POST">
	<tr>
		<td>
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre" >
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="usuario" class="form-control" required  placeholder="Usuario" >
		</td>
	</tr>
	<tr>
		<td>
			<input type="password" name="clave" class="form-control" required  placeholder="Clave" >
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
	$query=mysql_query("INSERT INTO usuario(id_usuario, nombre,usuario,clave,acceso) VALUES (NULL, '$_POST[nombre]',
		'$_POST[usuario]', '$_POST[clave]','1')");
	if($query)
	{
		echo "<script>location.replace('admin_user.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}
require("fotter.php");
?>