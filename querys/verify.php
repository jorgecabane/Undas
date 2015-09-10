<?php
/*
 * en este documento se declaran las funciones que realizan la verificacion en la base
 * de datos para eventos en dos casos
 *
 * 1..... Una eco no puede tener 2 eventos a la misma fecha hora (independiente del TM asignado a ella)
 *
 * 2..... Un TM no puede tener 2 eventos a la misma fecha hora (independiente del lugar)
 */
require_once dirname ( __FILE__ ) . '/../conexionLocal.php'; // archivo de conexion local

// verificacion del tipo 1
function verifyEco($idEco, $dateTime, $type = 'array', $display = false) {
	if ($display == false) { // si solo se busca verificar (sin mostrar los duplicados)
		$query = "SELECT TM_idTM as idTM FROM evento WHERE Ecos_idEcos = $idEco AND HoraInicio = '$dateTime' ";
		$res = mysql_query ( $query ) or die ( mysql_error () ); // ejecutar la query
		if (mysql_affected_rows () >= 1) { // si hay algun error
			$result = false;
		} else {
			$result = true;
		}
	} else {
		$query = "SELECT concat(tm.Nombre, tm.Apellido) as Nombre FROM tm, evento WHERE Ecos_idEcos = $idEco AND HoraInicio = '$dateTime' AND TM_idTM = idTM";
		$res = mysql_query ( $query ) or die ( mysql_error () ); // ejecutar la query
		if (mysql_affected_rows () >= 1) { // si hay algun error
			while ( $row = mysql_fetch_assoc ( $res ) ) {
				$result [] = $row;
			} // se guardan los valores en $result
		}else{
			$result = true;
		}
	}

	if ($type = 'json') {
		return json_encode ( $result );
	} else {
		return $result;
	}
}

// verificacion del tipo 2
function verifyTM($idTM, $dateTime, $type = 'array', $display = false) {
	if ($display == false) { // si solo se busca verificar (sin mostrar los duplicados)
		$query = "SELECT Ecos_idEcos FROM evento WHERE TM_idTM = $idTM AND HoraInicio = '$dateTime' ";
		// var_dump($query);
		$res = mysql_query ( $query ) or die ( mysql_error () ); // ejecutar la query
		if (mysql_affected_rows () >= 1) { // si hay algun error
			$result = false;
		} else {
			$result = true;
		}
	} else {
		$query = "SELECT ecos.Nombre, centro.Nombre FROM evento, ecos, centro WHERE TM_idTM = $idTM AND HoraInicio = '$dateTime' AND Ecos_idEcos = idEcos AND Centro_idCentro = idCentro";
		// var_dump($query);
		$res = mysql_query ( $query ) or die ( mysql_error () ); // ejecutar la query
		if (mysql_affected_rows () >= 1) { // si hay algun error
			while ( $row = mysql_fetch_assoc ( $res ) ) {
				$result [] = $row;
			} // se guardan los valores en $result
		} else {
			$result = true;
		}
	}

	if ($type = 'json') {
		return json_encode ( $result );
	} else {
		return $result;
	}
}

//echo verifyEco(1, '2015-07-27 09:00:00', 'json', true);//coincidencia de evento sin display
// echo verifyTM(2, '2015-07-27 09:00:00', 'array',true);
?>