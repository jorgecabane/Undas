<?php

/*
 * script que hara update a un evento via ajax
 */
require_once dirname(__FILE__) . '/../querys/updateEvento.php'; //funcion de insercion de eventos
$idEvento = $_POST['idEvento'];
$start = $_POST['start'];
$end = $_POST['end'];

echo updateEvento($idEvento, $start, $end);
?>
