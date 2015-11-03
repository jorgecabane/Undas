<?php
include_once "../conexionLocal.php";
$idempresa=trim($_POST['idempresa']);
$nombre=trim($_POST['nombre']);
$rut=trim($_POST['rut']);
echo $rut;
$giro=trim($_POST['giro']);
$direccion=trim($_POST['direccion']);
$comuna=trim($_POST['comuna']);
$ciudad=trim($_POST['ciudad']);
$razonsocial=trim($_POST['razonsocial']);

$query="UPDATE empresa SET Nombre='$nombre', Rut='$rut', Giro='$giro', Direccion='$direccion', Comuna='$comuna', Ciudad='$ciudad', RazonSocial='$razonsocial' WHERE idEmpresa='$idempresa'";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

