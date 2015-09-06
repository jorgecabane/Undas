<?php
/*
 * script que eliminara evento via ajax
 */
require_once dirname(__FILE__).'/../querys/deleteEvento.php'; //funcion de eliminacion de eventos
$idEvento = $_POST['idEvento'];

//echo $idEvento;
echo deleteEvento($idEvento);

?>