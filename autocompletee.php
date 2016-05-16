<?php
include("conexion.php");
$nombre= $_GET["term"];
$consulta=mysql_query("SELECT * FROM cliente WHERE nombre LIKE '%$nombre%' OR documento LIKE '%$nombre%' ORDER BY nombre ASC");
   if(($cant_row=mysql_num_rows($consulta))>0){
       while($row=mysql_fetch_assoc($consulta))
      {
            $availableTags[]=$row["nombre"]." - ".$row["documento"];                                                      
      }
      }
      else
      {
      $availableTags[]= "No existe el cliente";
      }
      $valores =array_unique($availableTags);
      echo json_encode($valores);
?>