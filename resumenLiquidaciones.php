<?php
session_start ();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/isAdmin.php";
if ($_SESSION["usuario"]) {
	if (isAdmin($_SESSION["idusuario"],$_SESSION ["context"]) == 1) {
		$admin = 1;
	} else {
		$admin = 0;
	}
}
if($admin == 1){
$month = date ( 'm' );
$year = date ('Y');
?>
<br>
<script type="text/javascript" src="maphilight-master/jquery.maphilight.js"></script>
<div class="progress" style="display: none">
	<div class="progress-bar progress-bar-striped active"
		role="progressbar" style="width: 100%">
		<span class="sr-only">Cargando...</span>
	</div>
</div>
<div class="row">
	<div class="col-xs-2  col-xs-offset-3 text-center hidden-print">
		Mes:
		<select	class="form-control text-center" name="month" id="month">
			<option value="1" <?PHP if($month==1) echo "selected";?>>Enero</option>
			<option value="2" <?PHP if($month==2) echo "selected";?>>Febrero</option>
			<option value="3" <?PHP if($month==3) echo "selected";?>>Marzo</option>
			<option value="4" <?PHP if($month==4) echo "selected";?>>Abril</option>
			<option value="5" <?PHP if($month==5) echo "selected";?>>Mayo</option>
			<option value="6" <?PHP if($month==6) echo "selected";?>>Junio</option>
			<option value="7" <?PHP if($month==7) echo "selected";?>>Julio</option>
			<option value="8" <?PHP if($month==8) echo "selected";?>>Agosto</option>
			<option value="9" <?PHP if($month==9) echo "selected";?>>Septiembre</option>
			<option value="10" <?PHP if($month==10) echo "selected";?>>Octubre</option>
			<option value="11" <?PHP if($month==11) echo "selected";?>>Noviembre</option>
			<option value="12" <?PHP if($month==12) echo "selected";?>>Diciembre</option>
		</select>
	</div>
	<div class="col-xs-2   text-center hidden-print">
	A&ntilde;o:
		<select class="form-control text-center" name="year" id="year">
	<?PHP
	
for($i = 2015; $i <= date ( "Y" ); $i ++)
		if ($year == $i)
			echo "<option value='$i' selected>$i</option>";
		else
			echo "<option value='$i'>$i</option>";
		
	?>
</select>
	</div>

<div class="col-sm-2 hidden-print exporta text-center">
Imprimir
	<button class="btn btn-danger btn-block" onClick="window.print()"
		id="descargar" data-toggle="tooltip" data-placement="left"
		title="Descargar PDF!">
		<span class="glyphicon glyphicon-print"></span>
	</button>
</div>
</div>

<div id="Liquidaciones" style="margin: auto 0;" class="row"></div>

<script>
$("#month").change(function() {

	var month = $('#month').val();
	var year = $('#year').val();
	var date = year+'-'+month;
$("#Liquidaciones").slideDown('slow').load("honorarios/tablaLiquidaciones.php", {"mes": date}, 
		function() {
    $('.progress').slideUp('slow');
});
});
</script>
<script>
$("#year").change(function() {

	var month = $('#month').val();
	var year = $('#year').val();
	var date = year+'-'+month;
$("#Liquidaciones").slideDown('slow').load("honorarios/tablaLiquidaciones.php", {"mes": date}, 
		function() {
    $('.progress').slideUp('slow');
});
});
</script>
<script>
$( document ).ready(function() {
var d = new Date(),

n = d.getMonth()+1,

y = d.getFullYear();
var date = y+"-"+n;
$("#Liquidaciones").load("honorarios/tablaLiquidaciones.php", {"mes": date}); 
});
</script>
<?php 
} else {
	echo "Usted no tiene permisos para ver esta pagina.";
}