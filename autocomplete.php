<?php
include("conexion.php");
$nombre= $_GET["term"];
$consulta=mysql_query("SELECT * FROM producto WHERE nombre LIKE '%$nombre%' OR codigo_barra LIKE '%$nombre%' ORDER BY nombre ASC");
   if(($cant_row=mysql_num_rows($consulta))>0){
       while($row=mysql_fetch_assoc($consulta))
      {
            $availableTags[]=$row["nombre"]." - ".$row["codigo_barra"];                                                      
      }
      }
      else
      {
      $availableTags[]= "No existe el producto";
      }
      $valores =array_unique($availableTags);
      echo json_encode($valores);
?>