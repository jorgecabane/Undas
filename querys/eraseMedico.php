<?php
include_once "../conexionLocal.php";


$id=$_POST['id'];


$query="Delete from tm WHERE idTM=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Borrado con exito";

} else {
    //failure
    echo "Error en la eliminacion";

}

