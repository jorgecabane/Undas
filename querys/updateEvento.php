<?php

/*
 * updateEvento funcion que se conecta al a base de datos para actualizar la informacion de un evento
 *
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function updateEvento($idTM, $idEco, $start, $newStart, $end) {
    $start = explode('T', $start);
    $start = $start[0] . ' ' . $start[1];
    $end = explode('T', $end);
    $end = $end[0] . ' ' . $end[1];
    $newStart = explode('T', $newStart);
    $newStart = $newStart[0] . ' ' . $newStart[1];

    $query = "UPDATE evento SET Ecos_idEcos='$idEco', TM_idTM='$idTM', HoraInicio='$newStart', HoraTermino='$end' WHERE Ecos_idEcos='$idEco' AND TM_idTM='$idTM' AND HoraInicio='$start'";
    $result = mysql_query($query);
    if ($result) {
        return $query;
    } else {
        return $query;
    }
}

//var_dump ( getTM () );
?>