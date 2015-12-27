<?php

/*
 * @param {varchar} : $Rut = null
 * @return {array} : todos los eventos de un TM
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getEventosTM($Rut = null) {
    if ($Rut != null) {
        $query = "SELECT idEvento as id, HoraInicio as start, HoraTermino as end, color, idEcos as idEco, ecos.Nombre as description, concat('(', centro.Siglas,')') as title
				FROM evento, ecos, tm, centro
				WHERE RUT='$Rut' AND TM_idTM=idTM AND Ecos_idEcos=idEcos AND Centro_idCentro=idCentro";

        $res = mysql_query($query) or die(mysql_error());
        if (mysql_affected_rows() >= 1) {
            while ($row = mysql_fetch_assoc($res)) {
                $result [] = $row;
            } // while
        } else {
            $result = false;
        }
        return $result;
    } // si se le entrega correctamente rut del TM
}

// var_dump ( getEventosTM ( 1 ) );
?>