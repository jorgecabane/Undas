<?php
include_once "../conexionLocal.php";
$id=trim($_POST['idcentro']);
$nombre=trim($_POST['nombre']);
$siglas=trim($_POST['siglas']);

$query="UPDATE centro SET Nombre='$nombre', Siglas='$siglas' WHERE idCentro=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

