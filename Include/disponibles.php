<?php

/*
 * se muestra el listado de personas disponibles con la funcion getDisponibles($start,$end);
 */
require_once dirname ( __FILE__ ) . "/../querys/getDisponibles.php";
require_once dirname ( __FILE__ ) . "/../querys/getDisponiblesHora.php";
if(isset($_POST['start'])){
$start = $_POST['start'];
$end = $_POST['end'];

$disponibles = getDisponibles($start, $end);
echo json_encode($disponibles);
}
if(isset($_POST['dia'])){
	$dia = $_POST['dia'];
	$horaend = $_POST['horaend'];
	$horastart = $_POST['horastart'];
	
	$disponibles = getDisponiblesHora($dia, $horaend,$horastart);
	echo json_encode($disponibles);
}
?>
