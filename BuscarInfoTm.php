<?php
include "conexionLocal.php";
$valor=$_POST['valor'];
$result=mysql_query("Select idTM, Nombre, Apellido from TM");
$result2=mysql_query("Select Fecha, HoraInicio, HoraTermino from TimeTable Where TM_idTM=$valor");
$json_response = array();
            while ($row = mysql_fetch_array($result2, MYSQL_ASSOC)) {
                
        $row_array['Fecha'] = $row['Fecha'];
        $row_array['HoraInicio'] = $row['HoraInicio'];    
        $row_array['HoraTermino'] = $row['HoraTermino'];
        array_push($json_response,$row_array);
        
        };

            //echo $quert;
            echo json_encode($json_response);
            
?>
