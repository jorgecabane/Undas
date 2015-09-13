<?php

/*
 * getHoras funcion que se conecta a la base de datos para entregar la informacion de las horas hechas por un TM
 * en cada centro, dado un mes.
 *
 */
include_once dirname(__FILE__) . '/../conexionLocal.php'; // archivo de conexion local

function getHoras($rutTM, $date) {
$date = explode ("-",$date);
	
    $query = "Select tm.Nombre as TMNombre, tm.Apellido as TMApellido, empresa.Nombre as NombreEmpresa, 
                MONTH(evento.HoraInicio) as Mes, Year(evento.HoraInicio) as Year,
				sum((TIME_TO_SEC(evento.HoraTermino)/3600)-time_to_sec(evento.HoraInicio)/3600) as Horas,
				DAYOFWEEK(HoraInicio) as Semana
				from evento
				inner join ecos on (evento.Ecos_idEcos = ecos.idEcos)
				inner join centro on ( ecos.Centro_idCentro= centro.idCentro)
                inner join empresa on (empresa.idEmpresa = centro.Empresa_idEmpresa)
				inner join tm on (tm.idTM = evento.TM_idTM)
				where tm.Rut = '$rutTM' and MONTH(evento.HoraInicio) = $date[1] and YEAR(evento.HoraInicio) = $date[0]  
				group by NombreEmpresa, MES
				order by NombreEmpresa asc";

    $res = mysql_query($query) or die(mysql_error());

    if (mysql_affected_rows() >= 1) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }

        return $result;
    } else {
       // return 0;
    	$result[0]['Mes'] = $date[1];
    	$result[0]['Year'] = $date[0];
    	$query= mysql_query("Select Nombre, Apellido from TM where rut='$rutTM'");
    	$assoc= mysql_fetch_assoc($query);
    	$result[0]['TMNombre'] = $assoc['Nombre'];
    	$result[0]['TMApellido'] = $assoc['Apellido'];
    }
}

//var_dump ( getTM () );
?>