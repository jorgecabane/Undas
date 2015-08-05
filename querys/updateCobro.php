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
$query="UPDATE ValorHora SET Valor=$valor WHERE TM_idTM=$idTM and Centro_idCentro=$idCentro and Semana=1 ";
}
else {
$query="UPDATE ValorHora SET Valor=$valor WHERE TM_idTM=$idTM and Centro_idCentro=$idCentro and Semana=0";	
}

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

