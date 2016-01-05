<?php

/*
 * script que insertara evento via ajax
 * - revisa si el evento es en un dia feriado, en tal caso no lo inserta
 */
require_once dirname(__FILE__) . '/../querys/insertEvento.php'; //funcion de insercion de eventos
if (isset($_POST['idTM']) && isset($_POST['idEco']) && isset($_POST['start']) && isset($_POST['end'])) {
    $idTM = $_POST['idTM'];
    $idEco = $_POST['idEco'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    /*
     * se revisa que el evento no sea un dia feriado asignado en el arreglo de feriados
     */
    require_once dirname(__FILE__) . '/feriados.php'; //se incluye el arreglo con los dias feriados
    $errores = 0;
    foreach ($feriados as $feriado) {
        $startFeriado = explode('T', $feriado['start']);
        $endFeriado = explode('T', $feriado['end']);
        $startEvento = explode('T', $start);
        $endEvento = explode('T', $end);
        if ($startEvento[0] == $startFeriado[0] || $endEvento[0] == $endFeriado[0]) {
            $errores++;
        }
    }
    if ($errores == 0) {//si no hay coincidencias de fecha
        echo insertEvento($idTM, $idEco, $start, $end);
    }else{
        echo 'el evento es en dia feriado';
    }
}
?>
