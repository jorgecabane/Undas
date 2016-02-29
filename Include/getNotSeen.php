<?php

/*
 * Funcion que obtiene la cantidad de eventos no vistos desde la ultima conexion del TM
 */

require_once dirname(__FILE__) . '/../conexionLocal.php';


function getNotSeen($idTM) {
	//le mando la id del tm y busco primero cual es su rut,
	//con el rut, busco en logs cuando fue la ultima vez que se metió antes de esta
	//luego hago una consulta a evento, para ver cuantos eventos sin ver tiene desde esa fecha hasta ahora
	$query = "Select Rut from tm where idTM = $idTM";
	$res = mysql_query ( $query ) or die ( mysql_error () );
	$rutAssoc = mysql_fetch_assoc($res);
	$rut = $rutAssoc['Rut'];
	
	//si solamente se ha ingresado 1 vez -> mostrar todos los eventos
	$querylogs = "SELECT * FROM log where url like '%$rut%' ORDER BY horario DESC limit 2;";
	$reslogs = mysql_query ( $querylogs ) or die ( mysql_error () );
	if (mysql_num_rows($reslogs) >= 1 ) {
		while ( $row = mysql_fetch_assoc ( $reslogs ) ) {
			$result[] = $row;
		}
	$count = count ($result);
	if ($count == 1){
		//primera vez que ingresa
		$countNotSeen = "Select count(idEvento) as Count from evento where TM_idTM = $idTM";
		$rescount = mysql_query ( $countNotSeen ) or die ( mysql_error () );
			if (mysql_num_rows($rescount) >= 1 ) {
				$count = mysql_fetch_assoc ( $rescount );
				return $count['Count'];
			}
	}
	else{
		$lastaccess = $result[1];
		$horario = $lastaccess['horario'];
		//ha ingresado más de una vez
		$countNotSeen = "Select count(*) as Count from evento where TM_idTM = $idTM && LastModified >= '$horario'";
		$rescount = mysql_query ( $countNotSeen ) or die ( mysql_error () );
		if (mysql_num_rows($rescount) >= 1 ) {
			$count = mysql_fetch_assoc ( $rescount );
			return $count['Count'];
		}
	}
		
	}

}
?>
