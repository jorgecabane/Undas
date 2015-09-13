<?php
include_once "../conexionLocal.php";
$id=$_POST['ideco'];
$nombre=$_POST['nombre'];
$color=$_POST['color'];

$query="UPDATE ecos SET Nombre='$nombre', Color='$color' WHERE idEcos=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

