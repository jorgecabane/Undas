
<?php
include_once "../conexionLocal.php";
$nombre = $_POST ['nombre'];
$apellido = $_POST ['apellido'];
$rut = $_POST ['rut'];
$mail = $_POST ['mail'];
$celular = $_POST ['celular'];
$contrasena = $_POST ['contrasena'];



	// comprobamos si ha ocurrido un error.
	$query = "insert into TM values (null,'$nombre','$apellido','$rut','$mail','$celular','$contrasena',0)";
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
	