<?php
/*
 * documento que recibe el $idEco y devuelve el estado de la verificacion de disponibilidad de una eco
 * haciendo uso de la funcion verifyEco($idEco, $dateTime, 'json', true);
 * los ultimos dos parametros se asignan para mostrar quienes estan asignados a esta eco con sus nombres
 */
require_once dirname(__FILE__).'/../querys/verify.php';// funciones de verificacion
if(isset($_POST['idEco']) && isset($_POST['start'])){
	echo verifyEco($_POST['idEco'], $_POST['start']);
}else{
	echo 0;
}

?>