<?php
include_once "../conexionLocal.php";


$idTM=$_POST['id'];
$valor=$_POST['valor'];
$centro=$_POST['centro'];
$semana=$_POST['semana'];

$queryIdCentro="Select idCentro from Centro where Nombre='$centro'";
$resultadoIdCentro= mysql_query($queryIdCentro);
$idCentroAssoc= mysql_fetch_assoc($resultadoIdCentro);
$idCentro=$idCentroAssoc['idCentro'];

if($semana=="Semana"){
$query="Delete from ValorHora WHERE TM_idTM=$idTM and Centro_idCentro=$idCentro and Semana=1 ";
}
else {
$query="Delete from ValorHora WHERE TM_idTM=$idTM and Centro_idCentro=$idCentro and Semana=0";	
}



$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Borrado con exito";
	
} else { 
    //failure
    echo "Error en la eliminacion";
   
}   

