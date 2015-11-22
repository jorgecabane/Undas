<?php

/*
 * getMedicos funcion que se conecta al a base de datos para entregar la informacion de todos los Medicos
 * o un solo Medico si hay una variable que indique id del medico
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getMedicos($id = null) {
    if ($id == null) { // si se utilizo la funcion sin un id especifico
        $query = "SELECT idTM, Nombre, Apellido, Rut, Mail, Celular
				FROM tm
                                WHERE Doctor=1
                                ORDER BY Apellido ASC";
    } else { // si se indico un id para buscar solo los datos de dicha persona
        $query = "SELECT idTM, Nombre, Apellido, Rut, Mail, Celular
				FROM tm
				WHERE idTM=$id AND Doctor=1
                                ORDER BY Apellido ASC";
    }
    $res = mysql_query($query) or die(mysql_error());
    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
    } else {
       $result = false;
    }
    return $result;
}

//var_dump ( getMedicos() );
?>