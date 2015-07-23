
<?php
include_once('getTM.php'); //funcion getTM
$tms = getTM();
foreach($tms as $tm){
	echo $tm['Nombre'].' '.$tm['Apellido'].'<br>';	
}
?>