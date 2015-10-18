<?php
include_once "../conexionLocal.php";


$rutTM=$_POST['rut'];
if( isset($_POST['especifico'])){
$especifico=$_POST['especifico'];

$queryprestacion= mysql_query("Select idprestaciones from prestaciones where 
		Especifico='$especifico'");
$res=mysql_fetch_assoc($queryprestacion);
$idPrestacion= $res['idprestaciones'];

$query="Delete from prestacionestm WHERE TM_Rut='$rutTM' and prestaciones_idprestaciones=$idPrestacion ";

$resultadoborrar=mysql_query($query);
if($resultadoborrar) {
	//success
	echo"Borrado con exito";
	
} else { 
    //failure
    echo "Error en la eliminacion";
   
}   

}
if(isset($_POST['idPrestacion'])){
	$idPrestacion=$_POST['idPrestacion'];
	
	$query="Delete from prestacionestm WHERE TM_Rut='$rutTM' and prestaciones_idprestaciones=$idPrestacion ";
	
	$resultadoborrar=mysql_query($query);
	if($resultadoborrar) {
		//success
		echo"Borrado con exito";
	
	} else {
		//failure
		echo "Error en la eliminacion";
		 
	}
	
}