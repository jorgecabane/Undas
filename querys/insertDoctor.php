
<?php
include_once "../conexionLocal.php";
$nombre = trim($_POST ['nombre']);
$apellido = trim($_POST ['apellido']);
	// comprobamos si ha ocurrido un error.
	$rut=rand(0,9999090);
	$query = "insert into tm values (null,'$nombre','$apellido','$rut',NULL,NULL,NULL,0, NULL,NULL,1,NULL,0)";
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
	}
