<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	.horaTM{
		margin-bottom: 5px;
		text-align: center;
		padding: 2px;
	}
	.hdr{
		margin-bottom: 2px;
		text-align: center;
	}
	</style>
</head>
<body>


<?php
$ecos = array(
	'6'=>'Eco1',
	'7'=>'Eco2',
	'8'=>'Eco3'
	);
?>
<div class='container-fluid'>
	<div class="row">
		<div class="col-md-1">
			<div class="row">
			<div class="col-md-12 well well-sm hdr">Hora</div>
			</div>
		</div>
		<div class="col-md-11">
			<div class="row">
			<div class="col-md-2 well well-sm hdr">Lunes</div>	
			<div class="col-md-2 well well-sm hdr">Martes</div>
			<div class="col-md-2 well well-sm hdr">Miercoles</div>
			<div class="col-md-2 well well-sm hdr">Jueves</div>
			<div class="col-md-2 well well-sm hdr">Viernes</div>
			<div class="col-md-2 well well-sm hdr">Sabado</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="row">

<?php
for($i=0;$i<=5;$i++){//se generan lAs ECOS
	echo "<div class='col-md-2'>
			<div class='row'>";
	foreach ($ecos as $key => $value) {
		$size = 12/count($ecos);
		echo '<div class="col-md-'.$size.' well well-sm hdr">'.$value.'</div>';
	}
	echo " 
		</div>
	</div>";
}
echo "</div></div></div>";
for($j=0;$j<=51;$j++){ //se generan las horas
		if($j%4==0){
			echo '<hr class="small">'; ////////////////////////////////////////////////SEPARACION POR HORA////////////////
		}
		echo "<div class='row'  hora='".$j."'>
				  <div class='col-md-1 well well-sm horaTM'>hora</div>
				  <div class='col-md-11'>
					<div class='row'>";
		for ($i=0; $i <=5 ; $i++) { 
			echo "		<div class='col-md-2'>
							<div class='row'>";
			foreach ($ecos as $key => $value) {
			echo "				<div class='col-md-".$size." well well-sm horaTM'></div>";
			}
		echo "				</div>
						</div>";
		}
		echo '		</div>
				  </div>
			      </div>';
	}
echo "        </div>";	
?>


</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</html>