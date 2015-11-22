<?php
include_once "../conexionLocal.php";
$nombre = trim($_POST['nombre']);
$rut = trim($_POST['rut']);
$giro = trim($_POST['giro']);
$direccion = trim($_POST['direccion']);
$comuna = trim($_POST['comuna']);
$ciudad = trim($_POST['ciudad']);
$razon = trim($_POST['razon']);
$mail = trim($_POST['mail'])
$random=rand(1000000,9999999);
$contrasena=$nombre.$random;

$query = "insert into empresa values (null,'$nombre','$rut','$giro','$direccion','$comuna','$ciudad','$razon','$contrasena', $mail)";
$resultado = mysql_query($query);
if ($resultado) {
		echo "Perfecto, redireccionando";
		$to = $mail;
		$subject = "Contraseña TMTECNOMED";
		$txt = "Su contraseña es: <strong>$contrasena</strong><br>Dirigase a <a href='http://app.tmtecnomed.cl'>app.tmtecnomed.cl<a> para acceder al sitio.<br><br><img";
		$headers = "From: serviciotenico@tmtecnomed.cl" . "\r\n";
	
		mail($to,$subject,$txt,$headers);
	}
	else {
		echo "error en la creacion";
	}
?>
