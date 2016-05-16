<?php 
require("header.php");
require("conexion.php");
?>
<script type="text/javascript">
function llenar(serc)
{
	if (serc == "")
	{
		document.getElementById("idc").value="sin nada";
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
				document.getElementById("idc").value = xmlhttp.responseText;
			}
		}
		var valor = serc.split(" - ");
		xmlhttp.open("GET", "traer.php?acc=f&q="+valor[1],true);
		xmlhttp.send();
	}
}
function llen(ser)
{
	if (ser == "")
	{
		document.getElementById("idp").value="sin nada";
		document.getElementById("prec").value="sin nada";
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
				var res = xmlhttp.responseText.split(":");
				document.getElementById("idp").value = res[0];
				document.getElementById("prec").value = res[1];
				var caja = document.getElementById('canto');
				caja.setAttribute("max",res[2]);
			}
		}
		var valor = ser.split(" - ");
		xmlhttp.open("GET", "trer.php?q="+valor[1],true);
		xmlhttp.send();
	}
}

</script>
<div>
	<h4>Facturacion de Venta</h4>
	<table>		
	<form action="javascript: fn_agregar();" method="POST" id="frm_usu">
	<!--<tr>
		<td>
			<select class="form-control" required >
				<option value="">Seleccione</option>
				<option value="1">Compra</option>
				<option value="2">Venta</option>
			</select>
		</td>
	</tr>-->
	<tr>
		<td>	
			<input type="text" name="fecha" class="form-control" required  placeholder="Fecha">
		</td>
		<td>
			<input type="text" name="nfact" class="form-control" required  placeholder="Numero de Factura">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="nombre" class="form-control" required  placeholder="Nombre del Cliente" id="nombre" onblur="llenar(this.value)">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="producto" class="form-control" required  placeholder="Nombre del Producto" id="producto" onblur="llen(this.value)">
			<input type="hidden" name="idcli" id="idc">
			<input type="hidden" name="idprod" id="idp">
	</tr>
	<tr>
		<td>
			<input type="number" name="cantidad" class="form-control" required  placeholder="Cantidad" id="canto" min="1">
		</td>
		<td>
			<input type="number" name="precio" id="prec" class="form-control" required  placeholder="Precio por unidad"  step="any">
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
		//$count = 0;
		echo "
		<form method='post'>
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
			echo "</tr>";
 			*/
			echo "</table><span id='span_cantidad'></span></span><br><br><br><button type=\"submit\" class=\"btn btn-primary\">Guardar</button></form>"; ?>
</div>
<script type="text/javascript">
    $( "#nombre" ).autocomplete({
	source: "autocompletee.php",
    minLength: 1
	});
	$( "#producto" ).autocomplete({
	source: "autocomplete.php",
    minLength: 1
	});
	</script>
<?php 
/*if($_POST)
{
	$query=mysql_query("INSERT INTO venta (id_venta, fecha, numero, id_cliente, id_producto,cantidad, precio) VALUES 
		(NULL, '$_POST[fecha]','$_POST[nfact]','$_POST[idcli]',
		'$_POST[idprod]','$_POST[cantidad]','$_POST[precio]')");
		$antes = mysql_fetch_array(mysql_query("SELECT cantidad FROM inventario WHERE id_producto = $_POST[idprod]"));
		$cantant = $antes["cantidad"];
		$cantnuevo= ($cantant - $_POST["cantidad"]);
		$quer=mysql_query("UPDATE inventario SET  cantidad = '$cantnuevo' WHERE id_producto = '$_POST[idprod]'");
	if($query && $quer)
	{
		echo "<script>location.replace('admin_inventario.php?info=modificar');</script>";
	}
	else
	{
		echo mysql_error();//"<script>alert('Error al insertar');</script>";
	}
}*/
require("fotter.php");
?>