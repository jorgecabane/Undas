
<?php
include_once "../conexionLocal.php";
$idTM=trim($_POST['idTM']);
$valor=trim($_POST['cobro']);
$empresa=trim($_POST['idEmpresa']);
$semana=trim($_POST['semana']);

$queryIdTM="Select idTM from tm where Rut='$idTM'";
$resultado= mysql_query($queryIdTM);
$idassoc= mysql_fetch_assoc($resultado);
$idtecnologo=$idassoc['idTM'];



$queryrut="Select Rut as RutEmpresa from empresa where idEmpresa=$empresa";
$resultadorut= mysql_query($queryrut);
$Assoc= mysql_fetch_assoc($resultadorut);
$rutempresa=$Assoc['RutEmpresa'];


	// comprobamos si ha ocurrido un error.
	$query = "insert into valorhora values (null,$idtecnologo,$valor,$semana,$empresa,'$rutempresa')";

	
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
	else {
		
		echo "Error en la query";
	}