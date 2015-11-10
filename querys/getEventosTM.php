<?php

/*
 * getEcosTM funcion que se conecta al a base de datos para entregar los Eventos de un TM
 * se le debe entregar un idTM
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getEventosTM($Rut = null) {
    if ($Rut != null) {
        $query = "SELECT idEvento as id, HoraInicio as start, HoraTermino as end, color, idEcos as idEco, ecos.Nombre as description, concat(centro.Nombre, ' (', centro.Siglas,')') as title
				FROM evento, ecos, tm, centro
				WHERE RUT='$Rut' AND TM_idTM=idTM AND Ecos_idEcos=idEcos AND Centro_idCentro=idCentro";

        $res = mysql_query($query) or die(mysql_error());
        if (mysql_affected_rows()>= 1) {
            while($row = mysql_fetch_assoc($res)) {
                $result [] = $row;
            } // while
            return $result;
        } else {
            return 'No se encontraron eventos!';
        }
    } // si se le entrega correctamente el idCentro
}

// var_dump ( getEventosTM ( 1 ) );
?>