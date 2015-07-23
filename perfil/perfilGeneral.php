<?php
include "../conexionLocal.php";

$rut = $_POST ['Rut'];

?>


<div align="center">
	
</div>
</div>
<br>
<center>
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="nav active"><a href="#A" data-toggle="tab">Info</a></li>
			<li class="nav"><a href="#B" data-toggle="tab">Editar datos</a></li>
			<li class="nav"><a href="#C" data-toggle="tab">Cobros</a></li>
		</ul>


		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade in active" id="A">
			<h3>Informacion Trabajador</h3>
			 <?php
			include "informacionTm.php";
			?>
                    </table>
			</div>

			<div class="tab-pane fade" id="B">
				<h3>Cobros por Centro</h3>
				<br>

<?php

include "informacionCobro.php";
?>
			</div>

			<div class="tab-pane fade" id="C"><h3>Horario TM</h3></div>
		</div>
	</div>



