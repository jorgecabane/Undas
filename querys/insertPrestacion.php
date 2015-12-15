<?php
include_once "../conexionLocal.php";
$idTM=trim($_POST['idTM']);
$empresa=trim($_POST['idEmpresa']);
$idPrestacion=trim($_POST['idPrestacion']);

$queryIdTM="Select idTM from tm where Rut='$idTM'";
$resultado= mysql_query($queryIdTM);
$idassoc= mysql_fetch_assoc($resultado);
$idtecnologo=$idassoc['idTM'];

	// comprobamos si ha ocurrido un error.
	$query = "insert into prestacionestm values ($idPrestacion,$idtecnologo,$empresa)";

	
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
	else {
		
		echo "Error en la query";
	}