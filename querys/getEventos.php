<?php
/*
 * getEcos funcion que se conecta al a base de datos para entregar los Eventos de un Centro
 * se le debe entregar un idCentro
 *
 */
include_once dirname ( __FILE__ ) . '/../conexionLocal.php'; // archivo de conexion local
function getEventos($idCentro = null) {
	if ($idCentro != null) {
		$query = "SELECT concat(TM.Nombre,' ' ,TM.Apellido) as title, concat('2015-07-24T',HoraInicio) as start, concat('2015-07-24T',HoraTermino) as end, idEvento as id, Ecos_idEcos, TM_idTM
				FROM Evento, Ecos, TM
				WHERE TM_idTM=idTM AND Ecos_idEcos=idEcos AND Centro_idCentro=$idCentro";
		
		$res = mysql_query ( $query ) or die ( mysql_error () );
		
		while ( $row = mysql_fetch_assoc ( $res ) ) {
			$result [] = $row;
		} // while
		return $result;
	} // si se le entrega correctamente el idCentro
}
//var_dump ( getEventos (1) );
?>