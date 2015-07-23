
<?php
include_once "../conexionLocal.php";
$nombre = $_POST ['nombre'];
$apellido = $_POST ['apellido'];
$rut = $_POST ['rut'];
$mail = $_POST ['mail'];
$celular = $_POST ['celular'];
$contraseña = $_POST ['contrasena'];
$repetircontraseña = $_POST ['repetircontrasena'];

if ($contraseña == $repetircontraseña) {
	// comprobamos si ha ocurrido un error.
	$query = "insert into TM values (null,'$nombre','$apellido','$rut','$mail','$celular','$contraseña',0)";
	$resultado2 = mysql_query ( $query );
	if ($resultado2) {
		echo "Perfecto, redireccionando";
		?>

<meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
<?php
	} else {
		echo "Error el rut ya existe, intente denuevo";
		?>

<meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
<?php
	}
} else {
	echo " Las contraseñas no coinciden, redireccionando";
	?>
<meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
; 
    <?php
}

?>
    