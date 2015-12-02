<?php
include_once dirname(dirname(__FILE__)) . '/../conexionLocal.php'; // archivo de conexion

function getBugs(){
    $query = "SELECT * FROM bugs
        ORDER BY id DESC";


    $res = mysql_query($query) OR DIE(mysql_error());
    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }//while
    }//if
    else{
        $result = false;
    }
    return $result;
}

//var_dump(getBugs());
?>
