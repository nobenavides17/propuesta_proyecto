<?php 
require("header.php");
require("conexion.php");
?>
<script type="text/javascript">
function llenar(serc)
{
	var valor = serc.split(" - ");
	if (serc == "")
	{
		document.getElementById("idp").value="sin nada";
		return;
	}
	else
	{
		if (window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}
		else 
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState ==4 & xmlhttp.status == 200)
			{
				document.getElementById("idp").value = xmlhttp.responseText;
			}
		}
		var valor = serc.split(" - ");
		xmlhttp.open("GET", "traer.php?acc=i&q="+valor[1],true);
		xmlhttp.send();
	}
}
</script>
<div>
	<h4>Entrada de Inventario</h4>
	<table>		
	<form method="POST" action="javascript: fn_agregar();">
	<tr>
		<td>	
			<input type="text" name="nfact" class="form-control" required  placeholder="Numero de Factura">
		</td>
		<td>
			<input type="text" name="fecha" class="form-control" required  placeholder="Fecha">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="lote" class="form-control" required  placeholder="Lote">
			<input type="hidden" name="idprod" id="idp">
		</td>
		<td>
			<select name='proveedor' id='proveedor' class=\"form-control\" required>
             <option value=''>Proveedor</option>";
             <?php
             $consulta = mysql_query("SELECT * FROM proveedor");
             while($valor=mysql_fetch_array($consulta))
			 {
             echo"   
              <option value=\"$valor[0]\">$valor[1]</option> ";
			}?>
		 </select>
		</td>
	</tr>
	<tr>
		<td>	
			<input type="text" name="producto" class="form-control" required  placeholder="Nombre del Producto" id="producto" onblur="llenar(this.value)">
		</td>
	</tr>
	<tr>
		<td>
			<input type="number" name="precio" id="prec" class="form-control" required  placeholder="Precio por unidad" step="any">
		</td>
		<td>
			<input type="number" name="cantidad" id="canto" class="form-control" required  placeholder="Cantidad a ingresar" min="1">
		</td>
	</tr>
	<tr>
		<td>
			<button type="submit" class="btn btn-primary">Agregar</button><br><br>
		</td>
	</tr>
</form>
</table>
<?php 
	$count = 0;
	echo "<form method='post'>
		<table class=\"table table-bordered table-hover\" id='tablesA'>
		<tr class=\"success\">
			<td>Id Producto</td>
			<td>Nombre</td>
			<td>Costo Promedio</td>
			<td>Cantidad</td>
			<td>Total</td>
			<td>Accion</td>
			</tr>";	
		/*while($count < count($_SESSION["user"])){
			echo "<tr>
				<td>$_SESSION[user][$count]</td>
				<td>$_SESSION[user][$count]</td>
				<td>$_SESSION[user][$count]</td>
				<td>$_SESSION[user][$count]</td>
				<td>$_SESSION[user][$count]</td>
				<td><a href='' class='btn btn-primary'>Borrar</a></td>
				";
				$count ++;
			}

			echo "</tr>*/echo"</table><span id='span_cantidad'></span><br><br><br><button type=\"submit\" class=\"btn btn-primary\">Guardar</button></form>"; ?>
</div>
<script type="text/javascript">
    $( "#producto" ).autocomplete({
	source: "autocomplete.php",
    minLength: 1
	});
	</script>
<?php 
/*if($_POST)
{
	$que=mysql_query("INSERT INTO compra (id_compra, fecha, numero, lote, id_proveedor, id_producto, cantidad, precio) VALUES 
		(NULL, '$_POST[fecha]','$_POST[nfact]','$_POST[lote]','$_POST[proveedor]',
		'$_POST[idprod]','$_POST[cantidad]','$_POST[precio]')");
	$ant = mysql_query("SELECT precio, cantidad FROM inventario WHERE id_producto = $_POST[idprod]");
	if(mysql_num_rows($ant)>0)
	{
		$antes = mysql_fetch_array($ant);
		$precioant = $antes["precio"];
		$precionuevo= ($precioant + $_POST["precio"])/2;
		$cantant = $antes["precio"];
		$cantnuevo= ($cantant + $_POST["cantidad"]);
		$query=mysql_query("UPDATE inventario SET precio = '$precionuevo', cantidad = '$cantnuevo' WHERE id_producto = '$_POST[idprod]'");
	}
	else
	{
	$query=mysql_query("INSERT INTO inventario(id_inventario, id_producto, n_factura, 
		precio, fecha, lote, id_proveedor, cantidad) VALUES (NULL, '$_POST[idprod]','$_POST[nfact]','$_POST[precio]','$_POST[fecha]',
		'$_POST[lote]','$_POST[proveedor]','$_POST[cantidad]')");
	}
	if($query && $que)
	{
		echo "<script>location.replace('admin_inventario.php?info=add');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}*/
require("fotter.php");
?>