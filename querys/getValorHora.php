<?php
/*
 * getHoras funcion que se conecta a la base de datos para entregar la informacion de las horas hechas por un TM
 * en cada centro, dado un mes.
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getValorHora($rutTM) {

		$query = "SELECT ValorHora.Valor as Valor, ValorHora.Semana as Semana, Centro.Nombre as Centro,
                    TM.idTM as idTM from TM
                    inner join ValorHora on (TM.idTM = ValorHora.Tm_idTM )
                    inner join Centro on (Centro.idCentro = ValorHora.Centro_idCentro)
                    Where TM.Rut='$rutTM'
                    order by Centro asc";

	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
//var_dump ( getTM () );
?>