<?php

/*
 * Script que genera los eventos desde la base de datos indicandole el id del TM
 * en formato json para cargarlos en el calendario
 *
 * el formato de los eventos sera
 *
 *
 * evento = {
 * "title" : "Evento prueba",
 * "start" : "2015-07-22T10:14:28",
 * "end" : "2015-07-22T11:14:28",
 * "id" : "7",
 * "idEco" : "1",
 * "color" : "#ff0000",
 * "description" : "Centro las bellotas",
 * };
 *
 *
 *
 *
 *
 */
require_once dirname(__FILE__) . "/../querys/getEventosTM.php";
if (isset($_REQUEST['Rut'])) {

    echo json_encode(getEventosTM($_REQUEST['Rut']));
}
?>