<?php
/*
 * documento que recibe el $idTM y devuelve el estado de la verificacion de disponibilidad de un TM
 * haciendo uso de la funcion verifyTM($idTM, $dateTime, 'json', true);
 * los ultimos dos parametros se asignan para mostrar quienes estan asignados a esta eco con sus nombres
 */
require_once dirname(__FILE__).'/../querys/verify.php';// funciones de verificacion
if(isset($_POST['idTM']) && isset($_POST['start'])){
	echo verifyTM($_POST['idTM'], $_POST['start']);
}else{
	echo 0;
}

?>