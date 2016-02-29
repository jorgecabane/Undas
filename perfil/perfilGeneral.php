<?php
session_start ();
include_once "../conexionLocal.php";
include_once "../Include/isAdmin.php";
include_once "../Include/getNotSeen.php";

$rut = $_POST ['Rut'];
$nombreTM = $_POST ['nombreTM'];

if ($_SESSION["usuario"]) {
	if (isAdmin($_SESSION["idusuario"],$_SESSION ["context"]) == 1) {
		$admin = 1;
	} else {
		$admin = 0;
	}
}
?>
<div class="row well well-sm">
	<ul class="nav nav-tabs nav-pills hidden-print" id="myTabs">
		<li class="nav"><a href="#Atab" data-toggle="tab">Informaci&oacute;n</a></li>
		<li class="nav"><a href="#Btab" data-toggle="tab">Honorarios</a></li>
		<li class="nav active"><a href="#Ctab" data-toggle="tab">Horario <span class='label notseen label-danger top-right' style=' border-radius: 10px;'><?php if($_SESSION ["context"] != "super") {$notseen= getNotSeen($_SESSION ["idusuario"]); if ($notseen >= 1){echo $notseen;} }?></span></a></li>
		<li class="nav"><a href="#Etab" data-toggle="tab">Prestaciones</a></li>
		<?php if($admin==1){?>
		<li class="nav"><a href="#Dtab" data-toggle="tab">Liquidaciones</a></li>
		<?php }?>
	</ul>


	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane fade" id="Atab">
			<center>
				<h3>Informaci&oacute;n Trabajador</h3>
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

		<div class="tab-pane fade" id="Etab">
			<center>
				<h3 class="hidden-print">Prestaciones</h3>
			</center>
			<div class="container-fluid empresa">
            <?php include_once "selectEmpresa.php"; ?>
        </div>
		</div>
	</div>
</div>