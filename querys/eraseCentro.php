<?php
include_once "../conexionLocal.php";


$nombre=$_POST['nombre'];


$query="DELETE FROM Centro WHERE Nombre=$nombre";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Borrado con exito";
	
} else { 
    //failure
    echo "Error en la eliminacion";
   
}   

