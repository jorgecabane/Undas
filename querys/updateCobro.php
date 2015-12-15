<?php
include_once "../conexionLocal.php";

$idTM=trim($_POST['id']);
$valor=trim($_POST['valor']);
$empresa=trim($_POST['empresa']);
$semana=trim($_POST['semana']);
$semanaprevia=trim($_POST['semanaprevia']);

$query="Select idEmpresa from empresa where Nombre='$empresa'";
$resultado= mysql_query($query);
$Assoc= mysql_fetch_assoc($resultado);
$idEmpresa=$Assoc['idEmpresa'];

$query="UPDATE valorhora SET Valor='$valor', Semana=$semana WHERE TM_idTM=$idTM and Empresa_idEmpresa=$idEmpresa and Semana= $semanaprevia ";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

