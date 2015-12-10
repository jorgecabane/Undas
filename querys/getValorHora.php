<?php

/*
 * getHoras funcion que se conecta a la base de datos para entregar la informacion del valor hora hechas de un TM
 * 
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getValorHora($rutTM) {

    $query = "SELECT valorhora.Valor as Valor, valorhora.Semana as Semana, empresa.Nombre as Empresa, tm.idTM as idTM, empresa.idEmpresa as idEmpresa
    			from tm 
    			inner join valorhora on tm.idTM = valorhora.Tm_idTM
				inner join empresa on empresa.idEmpresa = valorhora.Empresa_idEmpresa
				WHERE tm.Rut='$rutTM'
                ORDER BY Empresa asc";

    $res = mysql_query($query) or die(mysql_error());

    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }

        return $result;
    } else {
        return false;
    }
}


?>

