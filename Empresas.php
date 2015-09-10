<?php
session_start ();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
?>
<div class="container-fluid">
	<div class="row well well-titles">
		<h3>
			<center>Perfiles Empresas</center>
		</h3>
	</div>


	<div class="row">

		<div class="col-sm-2 well well-sm">

			<h4>Busque por Empresa</h4>

			<input id="search" class="form-control" type="text" name="valor"
				placeholder="Filtre por Empresa" />

			<hr>
			<!-- divisor-->
			<div id="listado">

				<!-- aqui iria una tabla de todos los tms en caso de lata de buscar -->
                    <?php
																				if ($admin == 1) {
																					include "querys/getEmpresa.php";
																					$empresas = getEmpresa();

																					echo '<ul class="nav nav-pills nav-stacked">';

																					foreach ($empresas as $emp) {
																						echo '<li class="active fc-event" idEmpresa="' . $emp['idEmpresa'] . '"><a href="#">' . $emp['Nombre'] . '</a></li>';
																					}
																					echo '</ul>';
																					?>
																			<?php 	}
																				?>
                </div>

		</div>

        <?php
								// si no admin ve esto
								if ($admin == 1) {
									echo '<div class="col-sm-10" id="perfil">
            <div class="alert alert-info"><center><h4>Por favor seleccione una Empresa del listado de la izquierda para ver su informaci&oacute;n</h4></center></div>';
								}
								?>

        <!-- aqui va perfil -->
	</div>
	<!-- cierre perfil -->
</div>

</div>

<?php
// si es admin ve esto
if ($admin == 1) {
	echo '<script>
 			$( document ).ready(function() {
			$("#call").focus();
			});
		 </script>';
}
?>

<script src="include/filtro.js"></script>

<script>
    $(".fc-event").click(function() {
        $("#perfil").slideDown('2000').load("perfil/perfilEmpresa.php", {"idEmpresa": $(this).attr('idEmpresa'), 'nombreEmpresa': $(this).text()});

    });
</script>