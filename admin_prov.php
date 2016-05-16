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
					<td><a href="add_prov.php" class="btn btn-primary" style="margin-top:5%;">Agregar Proveedor</a></td>
				</tr>
			 </table></form>
			</div>
			<script>
				function ver(id, sr)
				{
					var select = sr;
					if(select == 0)
					{
					
					}
					else if(select == 1)
					{
						location.replace("add_prov.php?id="+id);
					}
					else if(select == 2)
					{
						if(window.confirm('¿Desea eliminar este proveedor'))
						{
							location.replace("admin_prov.php?action=elimin&id="+id);
						}
					}
				}
			</script>
<?php

     if(isset($_GET["action"])){
	 if($_GET["action"]== "elimin"){
		mysql_query("DELETE FROM proveedor WHERE id_proveedor='$_GET[id]'");
	}
	}
   if(isset($_GET["q"])){
	$q = $_GET["q"];
	$query = mysql_query("SELECT * FROM proveedor WHERE nombre LIKE '%$q%'");}
	else
	{
	$q="";
	$query = mysql_query("SELECT * FROM proveedor");
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
			<td>Id Categoria</td>
			<td>Nombre</td>
			<td>Direccion</td>
			<td>Telefono</td>
			<td>Acciones</td>
			</tr>";	
		while($data = mysql_fetch_array($query)){
			echo "<tr>
				<td>$data[0]</td>
				<td>$data[1]</td>
				<td>$data[2]</td>
				<td>$data[3]</td>
				<td><select style='width:70px;'>
				<option value=''>Menu</option>
				<option value='1' onclick='ver($data[0],1)'>Modificar</option>
				<option value='2' onclick='ver($data[0],2)'>Eliminar</option>
				</select></td> ";
			}
			echo "</tr></table>";
		}
echo"</div>";
require("fotter.php");
?>