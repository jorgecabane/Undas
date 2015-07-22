<?php
include "conexionLocal.php";
session_start();
$valor=$_POST['valor'];

      $quert="Select Nombre, Apellido, Rut from TM Where Nombre like '%$valor%' or Apellido like '%$valor%'";
$result=mysql_query($quert);
                         
            $json_response = array();
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                
        $row_array['Nombre'] = $row['Nombre'];
        $row_array['Apellido'] = $row['Apellido'];    
        $row_array['Rut'] = $row['Rut'];
        array_push($json_response,$row_array);
        
        };

            //echo $quert;
            echo json_encode($json_response);
           
?>
