<?php

/*
 * en este documento se declaran las funciones que realizan la verificacion en la base
 * de datos para eventos en dos casos
 *
 * 1..... Una eco no puede tener 2 eventos a la misma fecha hora (independiente del TM asignado a ella)
 *
 * 2..... Un TM no puede tener 2 eventos a la misma fecha hora (independiente del lugar)
 */
require_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local
// verificacion del tipo 1

function verifyEco($idEco, $dateTime, $type = 'array', $display = false) {
    if ($display == false) { // si solo se busca verificar (sin mostrar los duplicados)
        $query = "SELECT TM_idTM as idTM FROM evento WHERE Ecos_idEcos = $idEco AND HoraInicio = '$dateTime' ";
        $res = mysql_query($query) or die(mysql_error()); // ejecutar la query
        if (mysql_affected_rows() >= 1) { // si hay algun error
            $result = false;
        } else {
            $result = true;
        }
    } else {
        $query = "SELECT concat(tm.Nombre, tm.Apellido) as Nombre FROM tm, evento WHERE Ecos_idEcos = $idEco AND HoraInicio = '$dateTime' AND TM_idTM = idTM";
        $res = mysql_query($query) or die(mysql_error()); // ejecutar la query
        if (mysql_affected_rows() >= 1) { // si hay algun error
            while ($row = mysql_fetch_assoc($res)) {
                $result [] = $row;
            } // se guardan los valores en $result
        } else {
            $result = true;
        }
    }

    if ($type = 'json') {
        return json_encode($result);
    } else {
        return $result;
    }
}

// verificacion del tipo 2
/*
 * @param: {int} $idTM
 * @param: {date} $startDate
 * @param: {date} $endDate
 * @param: {string} type
 * @param: {bool} display
 *
 * @return: {bool, array}
 * ingresando los parametros verifica si hay eventos ya creados con los parametros ingresados
 * @output (true, array) : si hay coincidencias
 * @output: (false): si no hay coincidencias
 */
function verifyTM($idTM, $idCentro, $startDate, $endDate, $type = 'array', $display = false) {
    if ($display == false) { // si solo se busca verificar (sin mostrar los duplicados)
        $query = "SELECT Ecos_idEcos
                FROM evento
                WHERE TM_idTM = $idTM AND HoraInicio = '$startDate' ";
        // var_dump($query);
        $res = mysql_query($query) or die(mysql_error()); // ejecutar la query
        if (mysql_affected_rows() >= 1) { // si hay algun error
            $result = true;
        } else {
            $result = false;
        }
    } else {
        //se retorna un array con los centros donde se encuentra asignado el TM
        $query = "SELECT ecos.Nombre, CONCAT(centro.Nombre, '(', centro.Siglas, ')') as Centro
                FROM evento, ecos, centro
                WHERE TM_idTM = $idTM
                    AND ((HoraInicio BETWEEN '$startDate' AND '$endDate') OR (HoraTermino BETWEEN '$startDate' AND '$endDate'))
                    AND Ecos_idEcos = idEcos
                    AND Centro_idCentro = idCentro
                    AND idCentro NOT IN (SELECT idCentro FROM centro WHERE idCentro = $idCentro)";
        //var_dump($query);
        $res = mysql_query($query) or die(mysql_error()); // ejecutar la query
        if (mysql_affected_rows() >= 1) { // si hay algun error
            while ($row = mysql_fetch_assoc($res)) {
                $result [] = $row;
            } // se guardan los valores en $result
        } else {
            $result = false;
        }
    }

    if ($type = 'json') {
        return json_encode($result);
    } else {
        return $result;
    }
}

//echo verifyEco(1, '2015-07-27 09:00:00', 'json', true);//coincidencia de evento sin display
// echo verifyTM(2, '2015-07-27 09:00:00', 'array',true);
?>