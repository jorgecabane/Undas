<?php

include_once "../conexionLocal.php";

$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$rut = trim($_POST['rut']);
$mail = trim($_POST['mail']);
$celular = trim($_POST['celular']);
$banco = trim($_POST['banco']);
$cuenta = trim($_POST['cuenta']);

$query = "UPDATE tm SET Nombre='$nombre', Apellido='$apellido', Rut='$rut', Mail='$mail', Celular=$celular, Banco='$banco', Cuentacorriente=$cuenta WHERE Rut='$rut'";

$resultado = mysql_query($query);
if ($resultado) {
    //success
    echo "Actualizado con exito, redireccionando";
} else {
    //failure
    echo "Se produjo un error en la actualizacion " . $query;
}

