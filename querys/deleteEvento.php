<?php

/*
 * @param {string/array} : $idEvento -> {idTM, start, end}
 * @param {bool} : $param
 * @return {bit}  Funcion recibe el id de un evento para eliminarlo de la base de datos, retorna
 * 1 si success o 0 si fail
 */
require_once dirname(__FILE__) . '/../conexionLocal.php';

function deleteEvento($idEvento) {
    $query = "DELETE FROM evento WHERE idEvento=$idEvento";

    $result = mysql_query($query);
    if (mysql_affected_rows() == 1) {
        return 1;
    } else {
        return $query;
    }
}

?>