<?php

/*
 * Funcion recibe los datos de un evento para ingresarlo en la base de datos, retorna
 * 1 si success o 0 si fail
 */
require_once dirname(__FILE__).'/../conexionLocal.php';
function insertEvento($idTM, $idEco, $start, $end){
    $query = "INSERT INTO evento ('TM_idTM, Ecos_idEcos, HoraInicio, HoraTermino') VALUES ($idTM,$idEco,$start, $end)";
    $result = mysql_query($query);
    if($result){
        return 1;
    }
    else{
        return 0;
    }
}
?>
