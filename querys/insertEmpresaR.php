<?php

include_once "../conexionLocal.php";
if(isset($_POST['nombre'],$_POST ['rut'],$_POST ['mail'])){
$nombre = trim($_POST['nombre']);
$rut = trim($_POST['rut']);
$giro = trim($_POST['giro']);
$direccion = trim($_POST['direccion']);
$comuna = trim($_POST['comuna']);
$ciudad = trim($_POST['ciudad']);
$razon = trim($_POST['razon']);
$mail = trim($_POST['mail']);
$random = rand(1000000, 9999999);
$contrasena = $nombre . $random;

$query = "insert into empresa values (null,'". mysql_real_escape_string($nombre) ."','". mysql_real_escape_string($rut) ."','". mysql_real_escape_string($giro) ."',
'". mysql_real_escape_string($direccion) ."','". mysql_real_escape_string($comuna) ."','". mysql_real_escape_string($ciudad) ."','". mysql_real_escape_string($razon) ."',
'". md5($contrasena) ."', '". mysql_real_escape_string($mail) ."')";
$resultado = mysql_query($query);
if ($resultado) {
    echo "Agregado con éxito";
    $to = $mail;
    $subject = "Contraseña TMTECNOMED";
    $txt = "Su contraseña es: <strong>$contrasena</strong><br>Dirigase a <a href='http://app.tmtecnomed.cl'>app.tmtecnomed.cl<a> para acceder al sitio.<br><br><img";
    $headers = "From: serviciotenico@tmtecnomed.cl" . "\r\n";

    mail($to, $subject, $txt, $headers);
} else {
    echo "campo/s vacíos o rut ya existente";
}
}
else {
	echo "campo/s vacíos";
}
?>
