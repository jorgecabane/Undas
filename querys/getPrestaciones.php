<?php

/*
 * getPrestaciones funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getPrestaciones($rutTM, $empresa) {


    $query = "SELECT tm.Nombre as TM, prestaciones.Grupo as Grupo, prestaciones.Especifico as Especifico,
empresa.Nombre as Empresa
FROM prestaciones
inner join prestacionestm on (prestaciones.idprestaciones = prestacionestm.prestaciones_idprestaciones)
inner join tm on (tm.idTM = prestacionestm.TM_idTM )
inner join empresa on (empresa.idEmpresa = prestacionestm.Empresa_idEmpresa)
				WHERE tm.Rut = '$rutTM' and empresa.idEmpresa= $empresa
				ORDER BY Grupo asc";

    $res = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($res) >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
    } else {
        $result = false;
    }
    return $result;
}

//getPrestaciones
/*
 * @param {string}: rut de un TM
 * @param {string}: id centro
 * @return {array}: arreglo con las prestaciones del TM
 */
function getPrestacionesCentro($rutTM, $idCentro) {

    $query = "SELECT tm.Nombre as TM, prestaciones.Grupo as Grupo, prestaciones.Especifico as Especifico, empresa.Nombre as Empresa
              FROM prestaciones
                inner join prestacionestm on (prestaciones.idprestaciones = prestacionestm.prestaciones_idprestaciones)
                inner join tm on (tm.idTM = prestacionestm.TM_idTM )
                inner join empresa on (empresa.idEmpresa = prestacionestm.Empresa_idEmpresa)
                inner join centro on (centro.Empresa_idEmpresa = empresa.idEmpresa)
              WHERE tm.Rut = '$rutTM' and centro.idCentro= $idCentro
              ORDER BY Grupo asc";

    $res = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($res) >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
    } else {
        $result = false;
    }
    return $result;
}

/*
 * @param {varchar} : $especifico
 * @param {id} : $Empresa
 * @return {array} : listado con los tms que tienen esa prestacion asignada
 */
function getPrestacionesWidget($especifico, $Empresa = false) {
    if ($Empresa) {
        $query = "SELECT concat(tm.Nombre,' ' ,tm.Apellido) as Nombre
                  FROM prestaciones
                       inner join prestacionestm on (prestacionestm.prestaciones_idprestaciones = prestaciones.idprestaciones)
                       inner join tm on ( tm.idTM = prestacionestm.TM_idTM)
                       inner join empresa on (empresa.idEmpresa = prestacionestm.Empresa_idEmpresa)
                  WHERE prestaciones.Especifico = '$especifico' AND
                      empresa.idEmpresa = '$Empresa'
                  ORDER BY tm.Apellido asc";
    } else {
        $query = "SELECT concat(tm.Nombre,' ' ,tm.Apellido) as Nombre, empresa.Nombre as Empresa
	          FROM prestaciones
                       inner join prestacionestm on (prestacionestm.prestaciones_idprestaciones = prestaciones.idprestaciones)
                       inner join tm on ( tm.idTM = prestacionestm.TM_idTM)
                       inner join empresa on (empresa.idEmpresa = prestacionestm.Empresa_idEmpresa)
                  WHERE prestaciones.Especifico = '$especifico'
                  ORDER BY Empresa asc, tm.Apellido asc";
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

//getPrestacionesCentro
?>