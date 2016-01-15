<?php
include_once dirname(dirname(__FILE__)) . "/Include/meses.php";
include_once dirname(dirname(__FILE__)) . "/querys/getLiquidaciones.php";
include_once dirname(dirname(__FILE__)) . "/querys/getTM.php";
$mes = $_POST ['mes'];
//div en caso de errores ( horasRealizadas sin valoresHora asociadas)
echo"<div id='errores'></div>";
//aqui parte Resumen Fecha y TM
$ruttm=getTM();

$liquidaciones = getLiquidaciones ($mes );
echo "<h3 align='center'>Resumen Liquidaciones</h3>
	  <table id='t01' class='table table-hover table-bordered' style='width: 95%' align='center' >
	   <tr>
        <th><font color='green'>Nombre Tecnologo</font></th>
        <th><font color='green'>Honorario bruto</font></th> 
		<th><font color='green'>Retencion</font></th> 
		<th><font color='green'>Honorario liquido</font></th> 
       </tr>";
    
Foreach($ruttm as $tm){
	if(isset($liquidaciones[$tm['Rut']][0])){
	echo "<tr  bgcolor='#c1c1a4' ><th>";
    echo $liquidaciones[$tm['Rut']][0]; 
    echo "</th><th>" ;
  	echo "$".number_format($liquidaciones[$tm['Rut']][1]);  
    echo "</th><th>";
    echo "$".number_format(($liquidaciones[$tm['Rut']][1])*0.1);
    echo "</th><th>";
    echo "$".number_format(($liquidaciones[$tm['Rut']][1])*0.9);
    echo "</th></tr>";
	}
}
echo "</table>"
?>
