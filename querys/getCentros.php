<?php
/*
 * getTM funcion que se conecta al a base de datos para entregar la informacion de todos los TM
 * o un solo TM si hay una variable $_POST['idTM'] que indique id
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getCentros($idCentro = null) {
	if ($idCentro == null) { // si se utilizo la funcion sin un id especifico
		$query = "SELECT idCentro, Nombre, Siglas, Empresa_idEmpresa
				FROM centro order by Nombre asc	";
	} else { // si se indico un id para buscar solo los datos de dicha persona
		$query = "SELECT idCentro, Nombre, Siglas, Empresa_idEmpresa
				FROM centro
				WHERE idCentro=$idCentro order by Nombre asc	"	;
	}
	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}

?>