<?php

/*
 * funcion de insercion de logs de ingreso y modificaciones (para saber tipo de
 * modifiacion se hizo donde)
 *
 * @param {string} : $url  //url donde se hizo la modificacion
 * @param {string} : $tipo //tipo de evento
 * @return {bool} // si se efectuo o no la insercion
 *
 */
include_once dirname(dirname(__FILE__)) . '/../conexionLocal.php'; // archivo de conexion

function insertLog($tipo, $url) {
    $query = "INSERT INTO log VALUES (NULL, NOW(), '$tipo', '$url')";
    //echo $query;
    $result = mysql_query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

//insertLog('login', $_SERVER['REMOTE_ADDR']);
?>
