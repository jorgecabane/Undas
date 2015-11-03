<?php
include_once "../conexionLocal.php";
$id=trim($_POST['ideco']);
$nombre=trim($_POST['nombre']);
$color=trim($_POST['color']);

$query="UPDATE ecos SET Nombre='$nombre', Color='$color' WHERE idEcos=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
   
}   

