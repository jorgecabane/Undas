<?php
/*
 * getPrestaciones funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getPrestacion() {
	
	
		$query = "Select idprestaciones as idPrestacion, Grupo, Especifico from prestaciones 
				order by Grupo asc";
	
	$res = mysql_query ( $query ) or die ( mysql_error () );
	if (mysql_num_rows($res) >= 1 ) {
	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}

else{
	return false;
}
}
?>