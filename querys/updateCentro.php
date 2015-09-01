<?php
include_once "../conexionLocal.php";
$id=$_POST['id'];
$nombre=$_POST['Nombre'];
$siglas=$_POST['siglas'];

$query="UPDATE Centro SET Nombre='$nombre', Siglas='$siglas' WHERE idCentro=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

