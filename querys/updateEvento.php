<?php

/*
 * updateEvento funcion que se conecta al a base de datos para actualizar la informacion de un evento
 *
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function updateEvento($idEvento, $start, $end) {
    $start = explode('T', $start);
    $start = $start[0] . ' ' . $start[1];
    $end = explode('T', $end);
    $end = $end[0] . ' ' . $end[1];


    $query = "UPDATE evento SET HoraInicio='$start', HoraTermino='$end', LastModified = NOW() WHERE idEvento=$idEvento";
    $result = mysql_query($query);
    if (mysql_affected_rows() == 1) {
        return 1;
    } else {
        return $query;
    }
}

//var_dump ( getTM () );
?>