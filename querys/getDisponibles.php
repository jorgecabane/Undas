<?php

/*
 * Funcion que va a buscar a la base de datos el listado de personas disponibles en un rango de tiempo indicado
 * $start: inicio del rango
 * $end: termino del rango
 */

include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getDisponibles($start, $end) {
    $query = "SELECT count(idTM) as tms FROM tm where Doctor = 0";
    $res = mysql_query($query);
    $result[] = mysql_fetch_assoc($res);

    $newStart = explode(' ', $start);
    $newEnd = explode(' ', $end);
    //manejo de la fecha para indicar el formato
    $query1 = "SELECT concat(tm.Nombre, ' ', tm.Apellido) as nombreTM
              FROM tm
              WHERE Doctor = 0 AND idTM NOT IN (SELECT DISTINCT(TM_idTM)
                                 FROM tm, evento
                                 WHERE tm.idTM = TM_idTM
                                    AND ((HoraInicio >= '$start' AND HoraInicio <='$end') OR (HoraTermino >= '$start' AND HoraTermino <='$end')                                        )
                   		ORDER BY TM_idTM)";
    //echo $query1;
    $res1 = mysql_query($query1) OR DIE(mysql_error());
    if (mysql_affected_rows() >= 1) {
        $res1 = mysql_query($query1) or die(mysql_error());

        while ($row = mysql_fetch_assoc($res1)) {
            $result[] = $row;
        }//while
    }//if
    else {
        $result[] = Array("nombreTM"=>false);
    }
    return $result;
}

?>
