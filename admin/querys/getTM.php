<?php
/*
 * getTM funcion que se conecta al a base de datos para entregar la informacion de todos los TM
 * o un solo TM si hay una variable $_POST['idTM'] que indique id
 *
 */
include_once dirname(dirname(dirname(__FILE__))).'/conexionLocal.php'; // archivo de conexion local
function getTecnologo($idTM = null) {
	if ($idTM == null) { // si se utilizo la funcion sin un id especifico
		$query = "SELECT idTM, Nombre, Apellido, Rut, Mail, Celular
				FROM tm
                                WHERE Doctor=0
                                ORDER BY Apellido ASC";


	} else { // si se indico un id para buscar solo los datos de dicha persona
		$query = "SELECT idTM, Nombre, Apellido, Rut, Mail, Celular
				FROM tm
				WHERE idTM = $idTM AND Doctor=0
                                ORDER BY Apellido ASC";
	}
	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
//var_dump ( getTM () );
?>