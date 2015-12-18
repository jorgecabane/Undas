<?php
include_once "../conexionLocal.php";


$idTM=$_POST['id'];
$valor=$_POST['valor'];
$idEmpresa=$_POST['empresa'];
$semana=$_POST['semana'];


$query="Delete from valorhora WHERE TM_idTM=$idTM and Empresa_idEMpresa=$idEmpresa and Semana=$semana and Valor = '$valor' ";




$resultadoborrar=mysql_query($query);
if($resultadoborrar) {
	//success
	echo"Borrado con exito";
	
} else { 
    //failure
    echo "Error en la eliminacion";
   
}   

