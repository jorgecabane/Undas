<?php
include_once "../conexionLocal.php";
$rut=$_POST['rut'];

$query="Delete from empresa WHERE Rut='$rut'";
$queryIngresoCentro=mysql_query("delete from tm where Rut='$rut'");
$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Borrado con exito";

} else {
    //failure
    echo "Error en la eliminacion";

}

