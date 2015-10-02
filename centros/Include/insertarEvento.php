<?php
/*
 * script que insertara evento via ajax
 */
require_once dirname(__FILE__).'/../querys/insertEvento.php'; //funcion de insercion de eventos
$idTM = $_POST['idTM'];
$idEco = $_POST['idEco'];
$start = $_POST['start'];
$end = $_POST['end'];

echo insertEvento($idTM, $idEco, $start, $end);

?>
