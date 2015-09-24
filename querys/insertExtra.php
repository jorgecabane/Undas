
<?php
include_once "../conexionLocal.php";
$rutTM=$_POST['rutTM'];
$fecha=$_POST['fecha'];
$titulo=$_POST['titulo'];
$monto=$_POST['monto'];


$queryIdTM="Select idTM from tm where Rut='$rutTM'";
$resultado= mysql_query($queryIdTM);
$idassoc= mysql_fetch_assoc($resultado);
$idtecnologo=$idassoc['idTM'];

ECHO $fecha;

$query = "insert into extras_liquidacion values (NULL,$idtecnologo,'$fecha','$titulo',$monto)";

	
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
	else {
		
		echo "Error en la query";
	}