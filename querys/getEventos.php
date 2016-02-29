<?php

/**
 * getEventos funcion que se conecta al a base de datos para entregar los Eventos de un Centro
 * se le debe entregar un idCentro
 * @param int $idCentro default null
 * @param bool $medicos default false
 * @return array listado eventos
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getEventos($idCentro = null, $medicos = false) {
    if ($idCentro != null) {
        if ($medicos) {
            $query = "SELECT ecos.Nombre as title, tm.Nombre nombreTM, tm.Apellido apellidoTM, idEvento as id, HoraInicio as start, HoraTermino as end, idEcos as idEco, idTM
				FROM evento, ecos, tm
				WHERE TM_idTM=idTM AND
                                      Ecos_idEcos=idEcos AND
                                      Centro_idCentro=$idCentro AND
                                      Doctor = 1";
        } else {
            $query = "SELECT ecos.Nombre as title, tm.Nombre nombreTM, tm.Apellido apellidoTM, idEvento as id, HoraInicio as start, HoraTermino as end, color, idEcos as idEco, idTM
				FROM evento, ecos, tm
				WHERE TM_idTM=idTM AND
                                      Ecos_idEcos=idEcos AND
                                      Centro_idCentro=$idCentro AND
                                      Doctor = 0";
        }

        //echo $query;
        $res = mysql_query($query) or die(mysql_error());
        if (mysql_affected_rows() >= 1) {
            while ($row = mysql_fetch_assoc($res)) {
                $result [] = $row;
            } // while
        } else {
            $result = false;
        }
        return $result;
    } // si se le entrega correctamente el idCentro
}

//var_dump ( getEventos ( 1 ) );
?>