<?php

/*
 * se muestra el listado de personas disponibles con la funcion getDisponibles($start,$end);
 */
require_once dirname ( __FILE__ ) . "/../querys/getDisponiblesHora.php";


	$dia = $_POST['dia'];
	$horaend = $_POST['horaend'];
	$horastart = $_POST['horastart'];
	
	$disponibles = getDisponiblesHora($dia, $horaend,$horastart);
	echo json_encode($disponibles);

?>
