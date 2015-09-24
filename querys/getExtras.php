<?php
/*
 * getPrestacion funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut y dado que el no este asociado anteriormente a esta prestacion
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getExtras($rut,$date) {
	$date = explode ("-",$date);
	
		$query = "Select extras_liquidacion.Titulo as Titulo, extras_liquidacion.Monto as Monto from extras_liquidacion
		inner join tm on ( extras_liquidacion.TM_idTM = tm.idTM )
where tm.Rut = '$rut' and MONTH(extras_liquidacion.Fecha) = $date[1] and YEAR(extras_liquidacion.Fecha) = $date[0] order by Titulo asc";
	
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