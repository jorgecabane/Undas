<?php

include_once dirname(dirname(__FILE__)) . '/../conexionLocal.php'; // archivo de conexion

function getLogs() {
    /*
     * @param {void}
     * @return {array} : listado de logs [idLog/horario/tipo/url]
     */
    $query = "SELECT * FROM log
        ORDER BY horario DESC";


    $res = mysql_query($query) OR DIE(mysql_error());
    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }//while
    }//if
    else {
        $result = false;
    }
    return $result;
}

function getLogsParam($param) {
    /*
     * @param {int} : $param [1=idLog/2=horario/3=tipo/4=url]
     * @return {array} : listado de datos de $param
     */
    switch ($param) {
        case 1:
            $column = 'idLog';
            break;
        case 2:
            $column = 'DATE(horario)';
            break;
        case 3:
            $column = 'tipo';
            break;
        case 4:
            $column = 'url';
            break;
    }//switch

    $query = "SELECT DISTINCT ($column)
              FROM log
              ORDER BY $column";
    $res = mysql_query($query) OR DIE(mysql_error());
    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }//while
    }//if
    else {
        $result = false;
    }
    return $result;
}

?>
