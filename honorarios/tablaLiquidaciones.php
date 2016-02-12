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
echo "<br><div class = 'col-xs-10  col-xs-offset-1 text-center well well-md'>";
echo "<h3 align='center'>Resumen Liquidaciones</h3>
	<div class='table-responsive'>
	  <table id='t01' class='table table-hover table-bordered table-condensed'>
	   <thead><tr class='info'>
        <th>Tecn&oacute;logo</th>
        <th>Honorario bruto</th> 
		<th>Retenci&oacute;n</th> 
		<th>Honorario l&iacute;quido</th> 
       </tr></thead><tbody>";
    
Foreach($ruttm as $tm){
	if(isset($liquidaciones[$tm['Rut']][0])){
	echo "<tr  ><th>";
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
echo "</table></div></div>";
?>
