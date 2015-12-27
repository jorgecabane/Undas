<?php

/*
 * script que eliminara evento via ajax
 */
require_once dirname(__FILE__) . '/../querys/deleteEvento.php'; //funcion de eliminacion de eventos
if (isset($_POST['idEvento'])) {
    $idEvento = $_POST['idEvento'];
    echo deleteEvento($idEvento);
}

//echo $idEvento;
?>