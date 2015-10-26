<?php
include_once "../conexionLocal.php";
$idempresa=$_POST['idempresa'];
echo "$idempresa";
$query="DELETE FROM empresa WHERE idEmpresa=$idempresa";
$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Borrado con exito";

} else {
    //failure
    echo "Error en la eliminacion";

}

