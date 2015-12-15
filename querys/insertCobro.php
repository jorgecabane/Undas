<?php
include_once "../conexionLocal.php";
$rutTM=trim($_POST['idTM']);
$valor=trim($_POST['cobro']);
$empresa=trim($_POST['idEmpresa']);
$semana=trim($_POST['semana']);

$queryIdTM="Select idTM from tm where Rut='$rutTM'";
$resultado= mysql_query($queryIdTM);
$idassoc= mysql_fetch_assoc($resultado);
$idtecnologo=$idassoc['idTM'];

	// comprobamos si ha ocurrido un error.
	$query = "insert into valorhora values (null,$idtecnologo,'$valor',$semana,$empresa)";
	
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
	else {
		
		echo "Error en la query";
	}