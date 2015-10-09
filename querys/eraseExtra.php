<?php
include_once "../conexionLocal.php";

$rutTM=$_POST['rut'];
$titulo=$_POST['titulo'];
$monto=$_POST['monto'];
$fecha=$_POST['fecha'];
$date = explode ("-",$fecha);

$queryId="Select idTM from tm where Rut='$rutTM'";
$resultadoId= mysql_query($queryId);
$Assoc= mysql_fetch_assoc($resultadoId);
$idTM=$Assoc['idTM'];

$queryextra="Select max(id) as id from extras_liquidacion where TM_idTM=$idTM and Titulo='$titulo' 
and Monto=$monto and MONTH(Fecha) = $date[1] and YEAR(Fecha)=$date[0]";
$resultadoextra= mysql_query($queryextra);
$Assocextra= mysql_fetch_assoc($resultadoextra);
$idextra=$Assocextra['id'];

$query="Delete from extras_liquidacion WHERE id= $idextra ";

$resultadoborrar=mysql_query($query);
if($resultadoborrar) {
	//success
	echo"Borrado con exito";
	
} else { 
    //failure
    echo "Error en la eliminacion";
   
}   

