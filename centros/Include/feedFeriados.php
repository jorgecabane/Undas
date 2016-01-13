<?php

/*
 * Documeno que utiliza el arreglo de los feriados para generar los eventos en el calendario
 */

require_once dirname(__FILE__).'/feriados.php';
echo json_encode($feriados);
?>
