<?php

/*
 * script que hara update a un evento via ajax
 */
require_once dirname(__FILE__) . '/../querys/updateEvento.php'; //funcion de insercion de eventos
$idTM = $_POST['idTM'];
$idEco = $_POST['idEco'];
$start = $_POST['start'];
$end = $_POST['end'];
$newStart = $_POST['newStart'];

echo updateEvento($idTM, $idEco, $start, $newStart, $end);
?>
