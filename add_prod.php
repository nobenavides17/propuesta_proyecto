<?php 
require("header.php");
require("conexion.php");
?>
<div>
	<h4>Registro de Producto</h4>
	<table>		
	<form method="POST">
	<tr>
		<td>
			<input type="text" name="codigo" class="form-control" required  placeholder="Codigo de barra">
		</td>
	</tr>
	<tr>
		<td>	
			<input type="text" name="descripcion" class="form-control" required  placeholder="Descripcion">
		</td>
	</tr>
	<tr>
		<td>	
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="unidad" class="form-control" required  placeholder="Unidad">
		</td>
		<td>
			<input type="text" name="marca" class="form-control" required  placeholder="Marca">
		</td>
		<td>
			<input type="text" name="color" class="form-control" required  placeholder="Color">
		</td>
		<td>
			<input type="text" name="embalaje" class="form-control" required  placeholder="Embalaje">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="presentacion" class="form-control" required  placeholder="Presentacion">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="up1" class="form-control" required  placeholder="Utilidad Precio 1">
		</td>
		<td>
			<input type="text" name="up2" class="form-control" required  placeholder="Utilidad Precio 2">
		</td>
		<td>
			<input type="text" name="up3" class="form-control" required  placeholder="Utilidad Precio 3">
		</td>
		<td>
			<input type="text" name="up4" class="form-control" required  placeholder="Utilidad Precio 4">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="updf" class="form-control" required  placeholder="Utilidad por defecto">
		</td>
		<td>
			<input type="text" name="fechexp" class="form-control" required  placeholder="Fecha de expiracion">
		</td>
		<td>
			<input type="text" name="stockmin" class="form-control" required  placeholder="Existencias Minimas">
		</td>
	</tr>
	<td>
			<select name='categoria' id='categoria' class=\"form-control\" required>
             <option value=''>Seleccionar Categoria</option>";
             <?php
             $consul = mysql_query("SELECT * FROM categoria");
             while($val=mysql_fetch_array($consul))
			 {
             echo"   
              <option value=\"$val[0]\">$val[1]</option> ";
			}?>
		 </select>
		</td>
		<td>
			<select name='proveedor' id='proveedor' class=\"form-control\" required>
             <option value=''>Seleccionar Proveedor</option>";
             <?php
             $consulta = mysql_query("SELECT * FROM proveedor");
             while($valor=mysql_fetch_array($consulta))
			 {
             echo"   
              <option value=\"$valor[0]\">$valor[1]</option> ";
			}?>
		 </select>
		<td>
			<label>Activo</label>
			<input type="checkbox" name="activo" class="form-control">
		</td>
		<td>
			<label>Activar Utilidad</label>
			<input type="checkbox" name="utilidad" class="form-control">
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
	if(!isset($_POST["activo"]))
	{
		$activo = "inactivo";
	}
	else if($_POST["activo"] == "on")
	{
		$activo = "activo";
	}
	if(!isset($_POST["utilidad"]))
	{
		$utilidad = "inactivo";
	}
	else if($_POST["utilidad"] == "on")
	{
		$utilidad = "activo";
	}
	$query=mysql_query("INSERT INTO producto(id_producto, codigo_barra, nombre, descripcion, unidad, marca, color, embalaje, presentacion,
	 utilidad_precio1, utilidad_precio2, utilidad_precio3, utilidad_precio4, utilidad_defecto, fecha_vencimiento, stock_min, categoria, proveedor, estado, activar_utilidad)
	 VALUES (NULL, '$_POST[codigo]','$_POST[nombre]','$_POST[descripcion]','$_POST[unidad]','$_POST[marca]','$_POST[color]','$_POST[embalaje]',
	 '$_POST[presentacion]','$_POST[up1]','$_POST[up2]','$_POST[up3]','$_POST[up4]','$_POST[updf]','$_POST[fechexp]','$_POST[stockmin]',
	 '$_POST[categoria]','$_POST[proveedor]','$activo','$utilidad')");
	if($query)
	{
		echo "<script>location.replace('admin_prod.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}
require("fotter.php");
?>