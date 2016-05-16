<?php 
require("header.php");
require("conexion.php");
?>
<div>
	<h4>Nueva Categoria</h4>
	<table>		
	<form method="POST">
	<tr>
		<td>
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre de la Categoria" >
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
	$query=mysql_query("INSERT INTO categoria(id_categoria, nombre) VALUES (NULL, '$_POST[nombre]')");
	if($query)
	{
		echo "<script>location.replace('admin_categoria.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}
require("fotter.php");
?>