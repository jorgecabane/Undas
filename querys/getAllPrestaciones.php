<?php
/*
 * getPrestacion funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut y dado que el no este asociado anteriormente a esta prestacion
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
include_once dirname(__FILE__).'/getTMRut.php';

if(isset($_POST['idEmpresa'])){
$rut= $_POST['rut'];
$tm=getTMRut($rut);
$idtm=$tm['idTM'];
$empresa= $_POST['idEmpresa'];
function getAllPrestaciones($idtm,$empresa){
	
		$query = "Select idprestaciones as idPrestacion, Grupo, Especifico from prestaciones
where idprestaciones not in (Select idPrestacion from(Select idprestaciones as idPrestacion, Grupo, Especifico from prestaciones
inner join prestacionestm on ( prestaciones.idprestaciones = prestacionestm.prestaciones_idprestaciones )
where prestacionestm.TM_idTM = $idtm and prestacionestm.Empresa_idEmpresa = $empresa) x) order by Grupo asc";
	
	$res = mysql_query ( $query ) or die ( mysql_error () );
	if (mysql_num_rows($res) >= 1 ) {
	while ( $row = mysql_fetch_assoc ( $res ) ) {
		$result[] = $row;
	}

	echo json_encode($result);
}

else{
	return false;
}
}
getAllPrestaciones($idtm,$empresa);
}
?>