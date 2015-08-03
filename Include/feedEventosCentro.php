<?php
/*
 * Script que genera los eventos desde la base de datos indicandole el id del centro
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
 * "userID" : "1",
 * "color" : "#ff0000",
 * "className" : "ticketSrc_1",
 * "custom" : "test text here",
 * "eventDurationEditable" : true
 * };
 *
 *
 *
 *
 *
 */
require_once dirname ( __FILE__ ) . "/../querys/getEventos.php";
if (isset ( $_REQUEST ['idCentro'] )) {
	
	echo json_encode ( getEventos ( $_REQUEST ['idCentro'] ) );
}

?>
