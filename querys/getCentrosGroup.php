<?php

/*
 * Se hace un llamado al a base de datos para obtener los centros de cada empresa como un arreglo de 2 niveles
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getCentrosGroup() {
    $query = 'SELECT Nombre, idEmpresa FROM empresa';
    $res = mysql_query($query) or die(mysql_error());
    $result = array(); //inicializa array result
    while ($row = mysql_fetch_assoc($res)) {
        $idEmpresa = $row['idEmpresa'];
        $empresa = $row['Nombre'];
        //datos de cada centro

        $query2 = "SELECT idCentro, Nombre, Siglas FROM centro WHERE Empresa_idEmpresa = $idEmpresa";
        $res2 = mysql_query($query2) or die(mysql_error());
        $centros = array(); //inicializa array centros
        while ($row2 = mysql_fetch_assoc($res2)) {
            $centros[] = $row2; // se insertan los datos del centro dentro del array centros
        }
        $result["$empresa"][] = $centros;
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