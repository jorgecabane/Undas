
<?php
include_once "../conexionLocal.php";
$idTM=$_POST['idTM'];
$valor=$_POST['cobro'];
$centro=$_POST['idCentro'];
$semana=$_POST['semana'];

$queryIdTM="Select idTM from TM where Rut='$idTM'";
$resultado= mysql_query($queryIdTM);
$idassoc= mysql_fetch_assoc($resultado);
$idtecnologo=$idassoc['idTM'];


$queryIdCentro="Select Empresa_idEmpresa as idEmpresa from Centro where idCentro=$centro";
$resultadoIdCentro= mysql_query($queryIdCentro);
$idCentroAssoc= mysql_fetch_assoc($resultadoIdCentro);
$empresa=$idCentroAssoc['idEmpresa'];
	// comprobamos si ha ocurrido un error.
	$query = "insert into ValorHora values (null,$idtecnologo,$valor,$centro,$empresa,$semana)";
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}	