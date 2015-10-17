
<?php
include_once "../conexionLocal.php";
$nombre = $_POST ['nombre'];
$apellido = $_POST ['apellido'];
$rut = $_POST ['rut'];
$mail = $_POST ['mail'];
$cuenta = $_POST ['cuenta'];
$banco = $_POST ['banco'];
$celular = $_POST ['celular'];
$comentario = $_POST ['comentario'];
$random=rand(1000000,9999999);
$contrasena=$apellido.$random;
	
	// comprobamos si ha ocurrido un error.
	$query = "insert into tm values (null,'$nombre','$apellido','$rut','$mail',$celular,'$contrasena',0,'$cuenta','$banco',0,'$comentario',0)";
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
		$to = $mail;
		$subject = "Contraseña TMTECNOMED";
		$txt = "tu contraseña es: $contrasena, Dirigase a app.tmtecnomed.cl para acceder al sitio.";
		$headers = "From: serviciotenico@tmtecnomed.cl" . "\r\n";
		
		mail($to,$subject,$txt,$headers);
	}
	else {
		echo "error en la creacion";
	}
	