<?php
/*
 * getTM funcion que se conecta al a base de datos para entregar la informacion de todos los TM
 * o un solo TM si hay una variable $_POST['idTM'] que indique id
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getEmpresa($idEmpresa = null) {
	if ($idEmpresa == null) { // si se utilizo la funcion sin un id especifico
		$query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa order by Nombre asc	";
	} else { // si se indico un id para buscar solo los datos de dicha persona
		$query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa
				WHERE idEmpresa=$idEmpresa order by Nombre asc	"	;
	}
	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
//var_dump ( getTM () );

function getEmpresaNotSinTurno($idEmpresa = null) {
	if ($idEmpresa == null) { // si se utilizo la funcion sin un id especifico
		$query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa where idEmpresa not in (9) order by Nombre asc	";
	} else { // si se indico un id para buscar solo los datos de dicha persona
		$query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
		FROM empresa
		WHERE idEmpresa=$idEmpresa order by Nombre asc	"	;
	}
	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
?>