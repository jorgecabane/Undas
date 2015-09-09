<?php
/*
 * getHoras funcion que se conecta a la base de datos para entregar la informacion de las horas hechas por un TM
 * en cada centro, dado un mes.
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getHoras($rutTM,$mes) {

		$query = "Select tm.Nombre as TMNombre, tm.Apellido as TMApellido, centro.Nombre as NombreCentro, MONTH(evento.HoraInicio) as Mes, Year(evento.HoraInicio) as Year,
				sum((TIME_TO_SEC(evento.HoraTermino)/3600)-time_to_sec(evento.HoraInicio)/3600) as Horas
				from evento
				inner join ecos on (evento.Ecos_idEcos = ecos.idEcos)
				inner join centro on ( ecos.Centro_idCentro= centro.idCentro)
				inner join tm on (tm.idTM = evento.TM_idTM)
				where tm.Rut = '$rutTM' and MONTH(evento.HoraInicio) = $mes
				group by NombreCentro, MES
				order by NombreCentro asc";

	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
//var_dump ( getTM () );
?>