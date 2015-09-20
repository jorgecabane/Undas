
<?php
include_once "../conexionLocal.php";
$idTM=$_POST['idTM'];
$empresa=$_POST['idEmpresa'];
$idPrestacion=$_POST['idPrestacion'];

$queryIdTM="Select idTM from tm where Rut='$idTM'";
$resultado= mysql_query($queryIdTM);
$idassoc= mysql_fetch_assoc($resultado);
$idtecnologo=$idassoc['idTM'];



$queryrut="Select Rut as RutEmpresa from empresa where idEmpresa=$empresa";
$resultadorut= mysql_query($queryrut);
$Assoc= mysql_fetch_assoc($resultadorut);
$rutempresa=$Assoc['RutEmpresa'];


	// comprobamos si ha ocurrido un error.
	$query = "insert into prestacionestm values ($idPrestacion,$idtecnologo,'$idTM',$empresa,'$rutempresa')";

	
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
	else {
		
		echo "Error en la query";
	}