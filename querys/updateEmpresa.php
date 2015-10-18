<?php
include_once "../conexionLocal.php";

$nombre=trim($_POST['nombre']);
$rut=trim($_POST['rut']);
$giro=trim($_POST['giro']);
$direccion=trim($_POST['direccion']);
$comuna=trim($_POST['comuna']);
$ciudad=trim($_POST['ciudad']);
$razon=trim($_POST['razon']);

$query="UPDATE empresa SET Nombre='$nombre', Rut='$rut', Giro='$giro', Direccion='$direccion', Comuna='$comuna', Ciudad='$ciudad', RazonSocial='$razon' WHERE Rut='$rut'";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

