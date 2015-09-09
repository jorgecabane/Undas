<?php
include_once "../conexionLocal.php";


$rut=$_POST['rut'];


$query="Delete from tm WHERE Rut='$rut'";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Borrado con exito";

} else {
    //failure
    echo "Error en la eliminacion";

}

