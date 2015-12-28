<?php
session_start();
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

            <input id="search" class="form-control" type="text" name="valor" placeholder="Filtre por Empresa" />
            <hr>
            <!-- divisor-->
            <div id="listado">
                <!-- aqui iria una tabla de todos los tms en caso de lata de buscar -->
                <?php
                if ($admin == 1) {
                    include_once "querys/getEmpresa.php";
                    $empresas = getEmpresaNotSinTurno();

                    echo '<ul class="nav nav-pills nav-stacked">';

                    foreach ($empresas as $emp) {
                        echo '<li class="active fc-event" idEmpresa="' . $emp ['idEmpresa'] . '"><span class="glyphicon glyphicon-circle-arrow-right pull-right"></span><center class="nombreevento">' . $emp ['Nombre'] . '</center></li>';
                    }//foreach empresa
                    echo '</ul>';
                }
                ?>
            </div><!-- #listado -->
        </div>
      <?php
        // si no admin ve esto
        if ($admin == 1) {
            echo '<div class="col-sm-10">
                    <div class="progress" style="display:none">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                            <span class="sr-only">Cargando...</span>
                        </div>
                    </div>
                    <div id="perfil">
                        <div class="alert alert-info">
                        <center>
                        <h4>Por favor seleccione una Empresa del listado de la izquierda para ver su informaci&oacute;n</h4>
                    </center>
                    </div>
                  </div>';
        }
        ?>
    </div><!-- row -->
    <!-- cierre perfil -->
</div><!-- container -->

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
$(document).ready(function() {
$('.fc-event').css( "line-height", "2" );
$('.fc-event').css( "background-color", "rgb(51, 122, 183);" );
});

</script>
<script>
    $(".fc-event").click(function() {
        $(this).siblings().css("background-color", "rgb(51, 122, 183);");
        $(this).css("background-color", "gray");
        $('.progress').slideDown('slow');
        $("#perfil").slideDown('slow').load("perfil/perfilEmpresa.php", {"idEmpresa": $(this).attr('idEmpresa'),'nombreEmpresa': $(this).text()}, function() {
        	$('.progress').slideUp('slow');
        });

    });
</script>