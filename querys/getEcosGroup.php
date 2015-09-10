<?php

/*
 * Se hace un llamado al a base de datos para obtener los centros de cada empresa como un arreglo de 2 niveles
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getEcosGroup($idEmpresa) {
    $query = "SELECT idCentro, Nombre, Siglas FROM centro WHERE Empresa_idEmpresa = $idEmpresa";
    $res = mysql_query($query) or die(mysql_error());
    $result = array(); //inicializa array result

    while ($row = mysql_fetch_assoc($res)) {
        $centro['idCentro'] = $row['idCentro'];
        $centro['Nombre'] = $row['Nombre'];
        $centro['Siglas'] = $row['Siglas'];
        $idCentro = $row['idCentro'];
        //datos de cada centro
        $query2 = "SELECT idEcos, Nombre, color FROM ecos WHERE Centro_idCentro = $idCentro";
        $res2 = mysql_query($query2) or die(mysql_error());
        $Ecos = array(); //inicializa array centros
        while ($row2 = mysql_fetch_assoc($res2)) {
            $Ecos[] = $row2; // se insertan los datos del centro dentro del array centros
        }
        $centro['Ecos'] = $Ecos;
        $result[]=$centro;
    }//while
    return $result;
}

/*foreach (getCentrosGroup() as $empresa=>$dataEmpresa) {
    echo $empresa.'<br>';
    foreach ($dataEmpresa as $centros) {
        foreach($centros as $centro){
            echo $centro['Nombre'].'<br>';
        }

    }
    echo '<hr>';
}*/
?>