<?php

/*
 * se muestra el listado de personas disponibles con la funcion getDisponibles($start,$end);
 */
require_once dirname ( __FILE__ ) . "/../querys/getDisponibles.php";

$start = $_POST['start'];
$end = $_POST['end'];

$disponibles = getDisponibles($start, $end);
echo json_encode($disponibles);

?>
