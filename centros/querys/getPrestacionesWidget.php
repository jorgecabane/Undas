<?php

/*
 * getPrestaciones funcion que se conecta a la base de datos para entregar la informacion de todas
 * las prestaciones de un tm especifico, dado su Rut
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local


if(isset($_POST['Empresa'])){
$Empresa=	$_POST['Empresa'];
$especifico = $_POST['especifico'];

$query = "select concat(tm.Nombre,' ' ,tm.Apellido) as Nombre, empresa.Nombre as Empresa
from prestaciones
inner join prestacionestm on (prestacionestm.prestaciones_idprestaciones = prestaciones.idprestaciones)
inner join tm on ( tm.idTM = prestacionestm.TM_idTM)
inner join empresa on (empresa.Rut = prestacionestm.Empresa_Rut)
where  
prestaciones.Especifico = '$especifico'
and
empresa.idEmpresa = '$Empresa'
ORDER BY tm.Apellido asc";

    $res = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($res) >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
        $empresa=' ';
        foreach ( $result as $nombre)
        {   if($nombre['Empresa'] != $empresa  ){
        	echo "<strong>";
        	echo $nombre['Empresa'];
        	$empresa = $nombre['Empresa'];
        	echo "</strong>";
        	echo "<br>";
        	
        }
        	echo $nombre['Nombre'];
        	echo "<br>";
        }
    } else {
       echo "<center><strong>No existen Tecn&oacute;logos <br> con esta prestaci&oacute;n</center></strong>";
    }
}
if(isset($_POST['especifico']) && !isset($_POST['Empresa']) )
{
	$especifico = $_POST['especifico'];

	$query = "select concat(tm.Nombre,' ' ,tm.Apellido) as Nombre, empresa.Nombre as Empresa
	from prestaciones
	inner join prestacionestm on (prestacionestm.prestaciones_idprestaciones = prestaciones.idprestaciones)
	inner join tm on ( tm.idTM = prestacionestm.TM_idTM)
	inner join empresa on (empresa.Rut = prestacionestm.Empresa_Rut)
	where
	prestaciones.Especifico = '$especifico'
	ORDER BY Empresa asc, tm.Apellido asc";

	$res = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($res) >= 1) {
		while ($row = mysql_fetch_assoc($res)) {
			$result[] = $row;
		}
		$empresa='sinnombre';
		foreach ( $result as $nombre)
		{if($nombre['Empresa'] != $empresa  ){
			echo "<strong>";
			echo $nombre['Empresa'];
			$empresa = $nombre['Empresa'];
			echo "</strong>";
			echo "<br>";
		}
		 
		echo $nombre['Nombre'];
		echo "<br>";
		}
	} else {
       echo "<center><strong>No existen Tecn&oacute;logos <br> con esta prestaci&oacute;n</center></strong>";
    }
}