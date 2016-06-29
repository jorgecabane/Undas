<?php

include_once dirname(dirname(__FILE__)) . '/../conexionLocal.php'; // archivo de conexion

function getBugs($type = 'all') {
    /**
     * @param string $type [all|tm|empresa] para que entregue el listado de bugs por cada tipo 
     */
    switch ($type) {
        case 'tm':
            $query = "SELECT * FROM bugs, tm
        WHERE idTM = tm_idTM
        ORDER BY fecha DESC;";
            break;
        case 'empresa':
            $query = 'SELECT * FROM bugs, empresa
        WHERE idEmpresa = empresa_idEmpresa
        ORDER BY fecha DESC';
            break;
        case 'all':
            $query = 'SELECT * FROM bugs';
    }
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

//var_dump(getBugs());
?>
