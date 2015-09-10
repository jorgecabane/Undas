<?php

/*
 * Funcion que va a buscar a la base de datos el listado de personas disponibles en un rango de tiempo indicado
 * $start: inicio del rango
 * $end: termino del rango
 */

include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local


function getDisponiblesHora($dia, $horastart, $horaend) {
	$query = "SELECT count(idTM) as tms FROM tm";
	$res = mysql_query($query);
	$result[]= mysql_fetch_assoc($res);

	//manejo de la fecha para indicar el formato
	$query = "SELECT concat(tm.Nombre, ' ', tm.Apellido) as nombreTM
	FROM tm
	WHERE idTM NOT IN (SELECT DISTINCT(TM_idTM)
	FROM tm, evento
	WHERE tm.idTM = TM_idTM AND (DATE(HoraInicio) BETWEEN '$dia' AND '$dia')) AND (TIME(HoraInicio) BETWEEN '$horastart' AND '$horaend')";
	$res = mysql_query($query) OR DIE(mysql_error());
	if ($res) {
		$res = mysql_query($query) or die(mysql_error());

		while ($row = mysql_fetch_assoc($res)) {
			$result[] = $row;
		}//while
		return $result;
	}//if
}

?>
