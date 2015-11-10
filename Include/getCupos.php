<?php

/*
 * Script que obtiene los cupos actuales indicando centro y fecha
 */

require_once dirname(__FILE__) . '/../querys/getCupos.php'; //funcion de insercion de eventos
$idCentro = $_POST['idCentro'];
$date = $_POST['date'];

$cupos = getCupos($idCentro, $date);
echo json_encode($cupos[0]);
?>
