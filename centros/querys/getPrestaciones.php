<?php
/*
 * getPrestaciones funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function getPrestaciones($rutTM,$empresa) {
	
	
		$query = "select tm.Nombre as TM, prestaciones.Grupo as Grupo, prestaciones.Especifico as Especifico,
empresa.Nombre as Empresa
from prestaciones
inner join prestacionestm on (prestaciones.idprestaciones = prestacionestm.prestaciones_idprestaciones)
inner join tm on (tm.idTM = prestacionestm.TM_idTM )
inner join empresa on (empresa.idEmpresa = prestacionestm.Empresa_idEmpresa)
				where tm.Rut = '$rutTM' and empresa.idEmpresa= $empresa
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