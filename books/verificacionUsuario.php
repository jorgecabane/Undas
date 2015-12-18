<?php
if (isset ( $_SESSION ["usuario"] )) {
	
	// osea si se loggeo
	$nombreUsuario = $_SESSION ["usuario"];
	$idUsuario = $_SESSION ["idusuario"];
} 

else {
	header ( "location:../logIn.php" );
	$_SESSION ["fallaste"] = "Debes ingresar primero";
}

?>