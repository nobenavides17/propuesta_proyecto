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
				<tr>
					<td><a href="add_prod.php" class="btn btn-primary" style="margin-top:5%;">Agregar Producto</a></td>
				</tr>
			 </table></form>
			</div>
			<script>
				function ver(id,sr)
				{
					var select =sr;
					if(select == 0)
					{
					
					}
					else if(select == 1)
					{
						location.replace("add_prod.php?id="+id);
					}
					else if(select == 2)
					{
						if(window.confirm('¿Desea eliminar este producto'))
						{
							location.replace("admin_prod.php?action=elimin&id="+id);
						}
					}
					else if(select == 3)
					{
    					$("#dialog"+id).dialog({
    						width:450
    					});
					}
				}
			</script>
<?php

     if(isset($_GET["action"])){
	 if($_GET["action"]== "elimin"){
		mysql_query("DELETE FROM producto WHERE id_producto='$_GET[id]'");
	}
	}
   if(isset($_GET["q"])){
	$q = $_GET["q"];
	$query = mysql_query("SELECT * FROM producto WHERE nombre LIKE '%$q%'");}
	else
	{
	$q="";
	$query = mysql_query("SELECT * FROM producto");
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
			<td>Marca</td>
			<td>Presentacion</td>
			<td>Acciones</td>
			</tr>";	
		while($data = mysql_fetch_array($query)){
			echo "<tr>
				<td>$data[0]</td>
				<td>($data[1]) $data[2]</td>
				<td>$data[5]</td>
				<td>$data[8]</td>
				<td><select style='width:70px;'>
				<option value=''>Menu</option>
				<option value='1' onclick='ver($data[0],1)'>Modificar</option>
				<option value='2' onclick='ver($data[0],2)'>Eliminar</option>
				<option value='3' onclick='ver($data[0],3)'>Ver detalles</option>
				</select></td> 
				<div id='dialog$data[0]' style='display:none;'>
				<div style='width:150px; text-align:left; float:left; font-weight:bold;'>Campo</div><div style='width:250px; text-align:left; float:left; display:inline; font-weight:bold;'>Descripcion</div><br>
            <div style='width:150px; text-align:left; float:left;'>Id Producto</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[0]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Descripcion</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[3]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Codigo de barra</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[1]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Unidad</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[4]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Marca</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[5]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Color</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[6]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Embalaje</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[7]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Presentacion</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[8]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Estado</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[18]</div><br>
            <div style='width:150px; text-align:left; float:left;'>Fecha Caducidad</div><div style='width:250px; text-align:left; float:left; display:inline;'>$data[14]</div><br><br>
            <div style='width:70px; text-align:left; float:left;'>Utilidad 1<br>$data[9]</div><div style='width:70px; text-align:left; float:left;'>Utilidad 2<br>$data[10]</div>
            <div style='width:70px; text-align:left; float:left;'>Utilidad 3<br>$data[11]</div><div style='width:70px; text-align:left; float:left;'>Utilidad 4<br>$data[12]</div><br>

				</div>";
			}
			echo "</tr></table>";
		}
echo"</div>";
require("fotter.php");
?>