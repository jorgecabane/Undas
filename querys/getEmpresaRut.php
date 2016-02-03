<?php

/**
 * getEmpresaRut
 *
 * @param int|varchar $rut rut de la empresa
 * @return array datos de la empresa Nombre|Rut|Giro|Direccion|Comuna|Ciudad|RazonSocial
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getEmpresaRut($rut) {
    $query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa
				WHERE Rut='$rut' order by Nombre asc";

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

