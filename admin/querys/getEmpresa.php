<?php

/**
 * getEmpresa($idEmpresa)
 *
 * @param varchar|null $idEmpresa
 * @return array empresas con sus atributos
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getEmpresa($idEmpresa = null) {
    if ($idEmpresa == null) { // si se utilizo la funcion sin un id especifico
        $query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa order by Nombre asc	";
    } else { // si se indico un id para buscar solo los datos de dicha persona
        $query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa
				WHERE Rut=$idEmpresa order by Nombre asc	";
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

//var_dump ( getTM () );

function getEmpresaNotSinTurno($idEmpresa = null) {
    if ($idEmpresa == null) { // si se utilizo la funcion sin un id especifico
        $query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa where idEmpresa not in (9) order by Nombre asc	";
    } else { // si se indico un id para buscar solo los datos de dicha persona
        $query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
		FROM empresa
		WHERE idEmpresa=$idEmpresa order by Nombre asc	";
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

?>