<?php
session_start ();
include_once "../conexionLocal.php";
$rut = $_POST ['Rut'];
// $_POST['Rut'] = '16.954.490-5';
$nombreTM = $_POST ['nombreTM'];
// $nombreTM = 'Andrea Amaro Mandolini'
?>
<div class="row well well-sm">
	<ul class="nav nav-tabs nav-pills hidden-print" id="myTabs">
		<li class="nav"><a href="#Atab" data-toggle="tab">Info</a></li>
		<li class="nav"><a href="#Btab" data-toggle="tab">Honorarios</a></li>
		<li class="nav active"><a href="#Ctab" data-toggle="tab">Horario</a></li>
		<li class="nav"><a href="#Dtab" data-toggle="tab">Liquidaciones</a></li>
	</ul>


	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane fade" id="Atab">
			<center>
				<h3>Informacion Trabajador</h3>
			</center>
            <?php require_once "informacionTm.php"; ?>
        </div>

		<div class="tab-pane fade" id="Btab">
			<center>
				<h3>Honorarios por Empresa</h3>
			</center>
            <?php include_once "informacionCobro.php"; ?>
        </div>

		<div class="tab-pane fade in active" id="Ctab">
			<center>
				<h3>Horario <?php echo "<span class='label label-info'>$nombreTM</span>"; ?></h3>
			</center>
            <?php include_once "informacionHorario.php"; //informacion del calendario personal del TM  ?>
        </div>

		<div class="tab-pane fade " id="Dtab">
			<center>
				<h3 class="hidden-print">Liquidaciones</h3>
			</center>
			<div class="container-fluid">
            <?php include_once "SelectMes.php"; ?>
        </div>
		</div>
	</div>
</div>