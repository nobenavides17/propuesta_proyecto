 <?php
require("header.php");
require("conexion.php");
?>		
	    <div><br>
	    <form method="GET" id="formulario" >
	    	<table>
			    <tr>
			    	<td>
			    		<input id="q" name="q" class="form-control" placeholder="Ingrese consulta por nombre de producto" style="width:470px" value="<?php if(isset($_GET["q"]))echo $_GET["q"];?>">
				    </td>
				    <td>
			    		<button type="submit" class="btn btn-primary " style="margin-left:25%;"> Buscar</button>
			    	</td>
				</tr>
				<?php
				if(!empty($_SESSION["admin"]))
				{
				echo "
				<tr>
					<td><a href=\"add_inv.php\" class=\"btn btn-primary\" style=\"margin-top:5%;\">Agregar Entrada</a></td>
				</tr> ";}?>
			 </table></form>
			</div>
			<script>
				function ver(id,sr)
				{
					var select = sr;
					if(select == 0)
					{
					
					}
					else if(select == 1)
					{
						location.replace("add_prod.php?id="+id);
					}
					else if(select == 2)
					{
						if(window.confirm('¿Desea eliminar este producto del inventario'))
						{
							location.replace("admin_inventario.php?action=elimin&id="+id);
						}
					}
				}
			</script>
<?php

     if(isset($_GET["action"])){
	 if($_GET["action"]== "elimin"){
		mysql_query("DELETE FROM inventario WHERE id_inventario='$_GET[id]'");
	}
	}
   if(isset($_GET["q"])){
	$q = $_GET["q"];
	$query = mysql_query("SELECT * FROM inventario, producto WHERE inventario.id_producto=producto.id_producto AND producto.nombre LIKE '%$q%' OR producto.codigo_barra LIKE '%$q%'");}
	else
	{
	$q="";
	$query = mysql_query("SELECT * FROM  inventario, producto WHERE inventario.id_producto=producto.id_producto");
	}
	if(!@mysql_num_rows($query)){
		echo "<br><div>
		       <strong>Error</strong><br>
		       No se produjeron resultados.
		      </div>";
	}else{
		$nrows =mysql_num_rows($query);
		
		if (isset($_GET["info"])){
			if ($_GET["info"] == "add")
			    echo "<br><div>
			     <strong>Exito</strong><br>
			    Registro agregado.
			   </div>";
				
			if ($_GET["info"] == "modificar")
				echo "<br><div>
			      <strong>Exito</strong><br>
			    Registro Modificado.
			   </div>";
			}else{
		       
		       echo "<br><div>
                           Registros encontrados:
                       <span>$nrows</span>
                       </div>";
			}
		echo "<p></p>
                <div>
		<table class=\"table table-bordered table-hover\">
		<tr class=\"success\">
			<td>Id Producto</td>
			<td>Nombre</td>
			<td>Descripcion</td>
			<td>Presentacion</td>
			<td>Costo Promedio</td>
			<td>Marca</td>
			<td>Color</td>
			<td>Existencias</td>";
			if(!empty($_SESSION["admin"]))
				{echo "
			<td>Acciones</td>
			</tr>";	}
		while($data = mysql_fetch_array($query)){
			echo "<tr>
				<td>$data[1]</td>
				<td>($data[9]) $data[10]</td>
				<td>$data[11]</td>
				<td>$data[16]</td>
				<td>$data[3]</td>
				<td>$data[13]</td>
				<td>$data[14]</td>
				<td>$data[7]</td>";
				if(!empty($_SESSION["admin"]))
				{echo "
				<td><select style='width:70px;'>
				<option value=''>Menu</option>
				<option value='1' onclick='ver($data[1],1)'>Modificar</option>
				<option value='2' onclick='ver($data[1],2)'>Eliminar</option>
				</select></td>
				";}
			}
			echo "</tr></table>";
		}
echo"</div>";
require("fotter.php");
?>