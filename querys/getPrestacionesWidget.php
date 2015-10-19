<?php

/*
 * getPrestaciones funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local


if(isset($_POST['idEmpresa'])){
$idEmpresa=	$_POST['idEmpresa'];
$especifico = $_POST['especifico'];

$query = "select concat(tm.Nombre,' ' ,tm.Apellido) as Nombre
from prestaciones
inner join prestacionestm on (prestacionestm.prestaciones_idprestaciones = prestaciones.idprestaciones)
inner join tm on ( tm.idTM = prestacionestm.TM_idTM)
where  
prestaciones.Especifico = '$especifico'
and
prestacionestm.Empresa_idEmpresa = $idEmpresa
ORDER BY tm.Apellido asc";

    $res = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($res) >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }

        foreach ( $result as $nombre)
        {
        	echo $nombre['Nombre'];
        	echo "<br>";
        }
    } else {
        return false;
    }
}
if(isset($_POST['especifico']) && !isset($_POST['idEmpresa']) )
{
	$especifico = $_POST['especifico'];
	
	$query = "select concat(tm.Nombre,' ' ,tm.Apellido) as Nombre
	from prestaciones
	inner join prestacionestm on (prestacionestm.prestaciones_idprestaciones = prestaciones.idprestaciones)
	inner join tm on ( tm.idTM = prestacionestm.TM_idTM)
	where
	prestaciones.Especifico = '$especifico'
	group by Nombre
	ORDER BY tm.Apellido asc";
	
	$res = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($res) >= 1) {
		while ($row = mysql_fetch_assoc($res)) {
			$result[] = $row;
		}
	
		foreach ( $result as $nombre)
		{
			echo $nombre['Nombre'];
			echo "<br>";
		}
	} else {
		return false;
	}
}

?>