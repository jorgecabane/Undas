<?php

/*
 * getCupos: entrega la candidad de cupos ya asignados por eventos creados para ese centro
 * @param{int}: $idCentro
 * @param{date}: $date
 * @return{array}: [idCentro, centro, Mes, Year, Cupos]
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getCupos($idCentro, $date) {
    $date = explode("-", $date);

    $query = "SELECT centro.idCentro as idCentro ,centro.Nombre as centro, MONTH(evento.HoraInicio) as Mes, Year(evento.HoraInicio) as Year,
                     FORMAT(SUM(TIME_TO_SEC(HoraTermino) - TIME_TO_SEC(HoraInicio))/900,0) as Cupos
              FROM evento inner join ecos on (evento.Ecos_idEcos = ecos.idEcos)
			  inner join centro on (ecos.Centro_idCentro= centro.idCentro)
                          inner join tm on (evento.TM_idTM = tm.idTM)
	      WHERE MONTH(evento.HoraInicio) = $date[1] AND
                    YEAR(evento.HoraInicio) = $date[0] AND
                    centro.idCentro = $idCentro AND
                    tm.Doctor = '0'
	      GROUP BY idCentro";
    //echo $query;

    $res = mysql_query($query) or die(mysql_error());

    if (mysql_num_rows($res) >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result [] = $row;
        }
        return $result;
    } else {
        return false;
    }
}

/*
 * getCuposMax: entrega la cantidad de cupos (turnos de 15min) que fueron ingresadas en la base de datos para ese
 * centro
 * @param {int}: $idCentro // id del centro correspondiente
 * @param {date}: $date // (opcional) fecha de la que se busca los cupos maximos
 * @return{array}
 */

function getCuposMax($idCentro, $date = false) {
    if (!$date) {
        $query = "SELECT *
                  FROM cuposlimite
                  WHERE centro_idCentro = $idCentro";
    } else {
        $date = explode('-', $date);
        $query = "SELECT *
                  FROM cuposlimite
                  WHERE centro_idCentro = $idCentro AND Mes = $date[1] AND Anio = $date[2]";
    }
    //echo $query;
    $res = mysql_query($query) or die(mysql_error());
    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
        return $result;
    } else {
        return false;
    }
}

//echo json_encode(getCupos(1, '2015-11-25'));
?>