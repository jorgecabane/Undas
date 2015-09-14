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
				and DAYOFWEEK(HoraInicio) not in (7)
				group by NombreEmpresa, MES
				order by NombreEmpresa asc";
    $querysabado = "Select tm.Nombre as TMNombre, tm.Apellido as TMApellido, empresa.Nombre as NombreEmpresa,
    MONTH(evento.HoraInicio) as Mes, Year(evento.HoraInicio) as Year,
    sum((TIME_TO_SEC(evento.HoraTermino)/3600)-time_to_sec(evento.HoraInicio)/3600) as Horas,
    DAYOFWEEK(HoraInicio) as Semana
    from evento
    inner join ecos on (evento.Ecos_idEcos = ecos.idEcos)
    inner join centro on ( ecos.Centro_idCentro= centro.idCentro)
    inner join empresa on (empresa.idEmpresa = centro.Empresa_idEmpresa)
    inner join tm on (tm.idTM = evento.TM_idTM)
    where tm.Rut = '$rutTM' and MONTH(evento.HoraInicio) = $date[1] and YEAR(evento.HoraInicio) = $date[0]
    and DAYOFWEEK(HoraInicio) in (7)
    group by NombreEmpresa, MES
    order by NombreEmpresa asc";
  

    $res = mysql_query($query) or die(mysql_error());
    $ressabado = mysql_query($querysabado) or die(mysql_error());

    if (mysql_num_rows($res) >= 1 ) {
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
      
           }
    if(mysql_num_rows($ressabado)>=1)
    {
    	while ($fila = mysql_fetch_assoc($ressabado)) {
    		$result[] = $fila;
    	}
    	
    }
    
    if(mysql_num_rows($res) >= 1 || mysql_num_rows($ressabado)>=1)
    { 
    	sort($result , SORT_ASC );
    	return $result;
    }
    else {
        return false;
    
    }
   
}

//var_dump ( getTM () );
?>