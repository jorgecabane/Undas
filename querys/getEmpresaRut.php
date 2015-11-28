<?php
/*
 * getTM funcion que se conecta al a base de datos para entregar la informacion de todos los TM
 * o un solo TM si hay una variable $_POST['idTM'] que indique id
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getEmpresaRut($rut) {
		$query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa
				WHERE Rut='$rut' order by Nombre asc	"	;

	$res = mysql_query ( $query ) or die ( mysql_error () );

	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	return $result;
}
//var_dump ( getTM () );

