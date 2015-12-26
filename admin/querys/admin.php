<?php
/*
 * getTM funcion que se conecta al a base de datos para entregar la informacion de todos los TM
 * o un solo TM si hay una variable $_POST['idTM'] que indique id
 *
 */
include_once dirname(__FILE__).'/../conexionLocal.php'; // archivo de conexion local
function admin($rut) {

        $query = "Select * from admin where Rut='$rut'";

    $res = mysql_query($query) or die(mysql_error());

    if (mysql_affected_rows() == 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result = $row;
        }
    } else {
        $result = false;
    }
    return $result;
}
//var_dump ( getTM () );
?>