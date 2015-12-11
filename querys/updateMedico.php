<?php

include_once "../conexionLocal.php";
$id= trim($_POST['id']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);


$query = "UPDATE tm SET Nombre='$nombre', Apellido='$apellido' WHERE idTM=$id";

$resultado = mysql_query($query);
if ($resultado) {
    //success
    echo "Actualizado con exito, redireccionando";
} else {
    //failure
    echo "Se produjo un error en la actualizacion ";
}

