<?php
include_once "../conexionLocal.php";

$nombre=$_POST['nombre'];
$rut=$_POST['rut'];
$giro=$_POST['giro'];
$direccion=$_POST['direccion'];
$comuna=$_POST['comuna'];
$ciudad=$_POST['ciudad'];
$razonsocial=$_POST['razonsocial'];

$query="UPDATE empresa SET Nombre='$nombre', Rut='$rut', Giro='$giro', Direccion='$direccion', Comuna='$comuna', Ciudad='$ciudad', RazonSocial='$razonsocial' WHERE Rut='$rut'";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

