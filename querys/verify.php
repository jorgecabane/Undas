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
		$query = "SELECT TM_idTM FROM evento WHERE Ecos_idEcos = $idEco AND HoraInicio = '$dateTime' ";
		$res = mysql_query ( $query ) or die ( mysql_error () ); // ejecutar la query
		if (mysql_affected_rows () >= 1) { // si hay algun error
			$result = array (
					'error' => 'La Eco ya tiene asignado un TM' 
			);
		}
	} else {
		$query = "SELECT TM.Nombre FROM TM, evento WHERE Ecos_idEcos = $idEco AND HoraInicio = '$dateTime' AND TM_idTM = idTM";
		$res = mysql_query ( $query ) or die ( mysql_error () ); // ejecutar la query
		while ( $row = mysql_fetch_assoc ( $res ) ) {
			$result [] = $row;
		} // se guardan los valores en $result
	}
	
	if ($type = 'json') {
		return json_encode ( $result );
	} else {
		return $result;
	}
}

echo verifyEco(1, '2015-07-27 09:00:00');//coincidencia de evento sin display

?>