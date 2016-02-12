<?php

/**
 * @param int $idEmpresa id de la empresa para obtener sus centros (null default)
 * @return array arreglo multinivel con cada empresa y sus centros
 *
 * */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getCentrosGroup($idEmpresa = null) {
    if ($idEmpresa == null) {
        $query = "SELECT Nombre, idEmpresa FROM empresa";
    } else {
        $query = "SELECT Nombre, idEmpresa FROM empresa WHERE idEmpresa = $idEmpresa";
    }
    $res = mysql_query($query) or die(mysql_error());

    $result = array(); //inicializa array final
    while ($row = mysql_fetch_assoc($res)) {
        $idEmpresa = $row['idEmpresa']; //id de la empresa
        $nombreEmpresa = $row['Nombre'];

        //datos de cada centro
        $query2 = "SELECT idCentro, Nombre, Siglas FROM centro WHERE Empresa_idEmpresa = $idEmpresa";
        $res2 = mysql_query($query2) or die(mysql_error());
        $centros = array(); //inicializa array centros

        while ($row2 = mysql_fetch_assoc($res2)) {
            $centros[] = $row2; // se insertan los datos del centro dentro del array centros
        }
        $empresa = array(); //arreglo para los datos de la empresa
        $empresa['idEmpresa'] = $idEmpresa;
        $empresa['Nombre'] = $nombreEmpresa;
        $empresa['centros'] = $centros; //centros asociados a la empresa
        $result[] = $empresa; //se guarda cada empresa
    }//while
    return $result;
}

//print_r(getCentrosGroup(4));
?>