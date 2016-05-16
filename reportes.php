 <?php
require("header.php");
require("conexion.php");
?>		
	    <div><br>
	    <form method="GET" id="formulario" >
	    	<table>
			    <tr>
			    	<td>
			    		<input id="q" name="q" class="form-control" placeholder="Ingrese consulta por nombre de producto" style="width:450px" value="<?php if(isset($_GET["q"]))echo $_GET["q"];?>">
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
<?php

     if(isset($_GET["action"])){
	 if($_GET["action"]== "elimin"){
		mysql_query("DELETE FROM producto WHERE id_prod='$_GET[id]'");
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
				<td>$data[3]</td>
				<td>$data[4]</td>
				<td><select style='width:70px;'>
				<option value=''>Menu</option>
				<option value='1'>Modificar</option>
				<option value='2'>Eliminar</option>
				<option value='3'>Ver deatalles</option>
				</select></td>";
			}
		
			echo "</tr>";
		}
		echo "</table>";
echo"</div>";
require("fotter.php");
?>