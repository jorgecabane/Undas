<?php
include_once "../conexionLocal.php";

$idTM=$_POST['id'];
$valor=$_POST['valor'];
$empresa=$_POST['empresa'];
$semana=$_POST['semana'];


$query="Select idEmpresa from empresa where Nombre='$empresa'";
$resultado= mysql_query($query);
$Assoc= mysql_fetch_assoc($resultado);
$idEmpresa=$Assoc['idEmpresa'];

if($semana=="Semana"){
$query="UPDATE ValorHora SET Valor=$valor WHERE TM_idTM=$idTM and Empresa_idEmpresa=$idEmpresa and Semana=1 ";
}
else {
$query="UPDATE ValorHora SET Valor=$valor WHERE TM_idTM=$idTM and Empresa_idEmpresa=$idEmpresa and Semana=0";	
}

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

