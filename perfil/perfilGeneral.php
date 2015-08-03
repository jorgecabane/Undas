<?php
include_once "../conexionLocal.php";
$rut = $_POST ['Rut'];

?>
<div class="row">
	<ul class="nav nav-tabs">
		<li class="nav active"><a href="#A" data-toggle="tab">Info</a></li>
		<li class="nav"><a href="#B" data-toggle="tab">Cobros</a></li>
		<li class="nav"><a href="#C" data-toggle="tab">Horario</a></li>
	</ul>


	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane fade in active" id="A">
			<center><h3>Informacion Trabajador</h3></center>
			 <?php require_once "informacionTm.php";?>
        </div>

		<div class="tab-pane fade" id="B">
			<center><h3>Cobros por Centro</h3></center>
			<?php include_once "informacionCobro.php";?>
		</div>

		<div class="tab-pane fade" id="C">
			<center><h3>Horario TM</h3></center>
			<?php require_once "informacionHorario.php"//informacion del calendario personal del TM?>
		</div>
	</div>
</div>