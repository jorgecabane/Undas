<?php
/*
 * getHoras funcion que se conecta a la base de datos para entregar la informacion de las horas hechas por un TM
 * en cada centro, dado un mes.
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getValorHora($rutTM) {

		$query = "SELECT valorhora.Valor as Valor, valorhora.Semana as Semana, centro.Nombre as Centro,
                    tm.idTM as idTM
                    FROM tm
                    inner join valorhora on (tm.idTM = valorHora.TM_idTM )
                    inner join centro on (centro.idCentro = valorhora.centro_idCentro)
                    WHERE tm.Rut='$rutTM'
                    ORDER BY Centro asc";

	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
//var_dump ( getTM () );
?>