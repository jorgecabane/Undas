<?php
session_start ();
include_once "/Include/isAdmin.php";
include_once "/Include/meses.php";
include_once "/querys/getLiquidaciones.php";
include_once "/querys/getTM.php";
if ($_SESSION ["usuario"]) { 
	if (isAdmin ( $_SESSION ["idusuario"] ) == 1) {
		$admin = 1;
	} else {
		$admin = 0;
	}
}
$mes = $_POST ['mes'];
echo "<br>";
//div en caso de errores ( horasRealizadas sin valoresHora asociadas)
echo"<div id='errores'></div>";
echo"<div id='chart_div'></div>";
//aqui parte Resumen Fecha y TM
$ruttm=getTM();

$liquidaciones = getLiquidaciones ($mes );
echo "<br>";
echo "<h3>Resumen Liquidaciones</h3>
	  <table id='t01' class='table table-hover table-bordered'>
	   <tr>
        <th><font color='green'>Nombre Tecnologo</font></th>
        <th><font color='green'>Total liquidacion</font></th> 
       </tr>";
    
Foreach($ruttm as $tm){
	if(isset($liquidaciones[$tm['Rut']][0])){
	echo "<tr><th>";
    echo $liquidaciones[$tm['Rut']][0]; 
    echo "</th><th>" ;
  	echo "$".number_format($liquidaciones[$tm['Rut']][1]);  
    echo "</th></tr>";
	}
}
echo "</table>"
?>
<html>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);


      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
         ['2004/05',  165,      938,         522,             998,           450,      614.6],
         ['2005/06',  135,      1120,        599,             1268,          288,      682],
         ['2006/07',  157,      1167,        587,             807,           397,      623],
         ['2007/08',  139,      1110,        615,             968,           215,      609.4],
         ['2008/09',  136,      691,         629,             1026,          366,      569.6]
      ]);

    var options = {
      title : 'Monthly Coffee Production by Country',
      vAxis: {title: 'Cups'},
      hAxis: {title: 'Month'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>

    <div id="chart_div" style="width: 900px; height: 500px;"></div>
</html>