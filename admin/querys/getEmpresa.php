<?php

/**
 * getEmpresa busca todas las empresas con sus datos o una empresa especificando su RUT
 *
 * @param varchar $idEmpresa
 * @return array empresas con sus atributos
 */
include_once dirname(dirname(dirname(__FILE__))) . '/conexionLocal.php'; // archivo de conexion local

function getEmpresaAdmin($idEmpresa = null) {
    // si se indico un id para buscar solo los datos de dicha persona
    $query = "SELECT idEmpresa, Nombre, Rut, Giro, Direccion, Comuna, Ciudad, RazonSocial
				FROM empresa
				WHERE idEmpresa=$idEmpresa order by Nombre asc	";
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