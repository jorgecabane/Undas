<?php

/*
 * se muestra el listado de personas con su respectiva liquidaciones en un mes dado
 */
require_once dirname ( __FILE__ ) . "/../querys/getLiquidaciones.php";

$fecha = $_POST['fecha'];


$liquidaciones = getLiquidaciones($fecha);
echo json_encode($liquidaciones);
//este json_encode deberia parecerse al de abajo :(
//$labels = array('29 April 2015', '30 April 2015', '1 May 2015', '2 May 2015', '3 May 2015', '4 May 2015', '5 May 2015');
//$points = array('100', '250', '10', '35', '73', '0', '25');
//echo json_encode(array('labels' => $labels, 'points' => $points));
?>
