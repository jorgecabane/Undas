<?php
/*
 * getEcos funcion que se conecta al a base de datos para entregar las TM de un Centro
 * se le debe entregar un idCentro
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getEcos($idCentro = null) {
	if($idCentro!=null){
	$query = "SELECT idEcos, Nombre, color
				FROM ecos
				WHERE Centro_idCentro=$idCentro";

	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}//while
	}//si se le entrega correctamente el idCentro
	else{
		$result = array('No Asignado');
	}
	return $result;
}
//var_dump ( getEcos (0) );
?>