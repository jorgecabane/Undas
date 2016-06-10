<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
include_once dirname(__FILE__) . "/querys/getTM.php";
?>
<div class="container-fluid">
    <div class="row well well-titles hidden-print">
        <h3>
            <center>Perfiles Tecn&oacute;logos M&eacute;dicos</center>
        </h3>
    </div>


    <div class="row">

        <?php
        // si es admin ve esto
        if ($admin == 1) {
            echo '
                <div class="col-sm-2 well well-sm hidden-print">
                <h4>Busque por TM</h4>

                <input id="search" class="form-control" type="text" name="valor"
                       placeholder="Filtre por TM" />

                <hr><!-- divisor-->
                <div id="listado">';
            include_once dirname(__FILE__)."/querys/todosTmListado.php";

            echo '</div>
                </div><!-- well-sm -->';
        }

// si no admin ve esto
        if ($admin == 0) {
            echo '<div class="col-sm-12" id="perfil">
                <div class="progress" style="display:none">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                    <span class="sr-only">Cargando...</span>
                    </div>
                </div>';
        } else {
            echo '<div class="col-sm-10">
            <div class="progress" style="display:none">
                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
            <div id="perfil">
            <div class="alert alert-info">
                <center>
                <h4>Por favor seleccione un TM del listado de la izquierda para ver su informaci&oacute;n</h4>
                </center>
            </div>
            </div>';
        }
        ?>

        <!-- aqui va perfil -->
    </div><!-- cierre perfil -->
</div>

</div>

<?php
// si es admin ve esto
if ($admin == 1) {
    echo "<script>
 			$(document).ready(function() {
			$('#search').focus();
			});
		 </script>";
} elseif ($admin == 0) {
    //print_r($_SESSION);

    $sessionrut = $_SESSION['idusuario'];
//echo $sessionrut;
   $row = getTM($sessionrut);
//   print_r($row);
    $Rut = $row[0]["Rut"];
    $nombreTM = $row[0]['Nombre'] . ' ' . $row[0]['Apellido'];

    echo "<script>
            $('.progress').slideDown('slow');
            $('#perfil').slideDown('slow').load('perfil/perfilGeneral.php', {'Rut': '$Rut', 'nombreTM': '$nombreTM'}, function(){
                $('.progress').slideUp('slow');
            });
	  </script>";
}
?>

<script src="Include/filtro.js"></script>
<script>
$(document).ready(function() {
$('.fc-event').css( "line-height", "2" );
$('.fc-event').css( "background-color", "rgb(51, 122, 183);" );  
});

</script>
<script>
    $(".fc-event").click(function() {
    	$(this).siblings().css( "background-color", "rgb(51, 122, 183);" );    	
    	$(this).css( "background-color", "gray" );
        rut = $(this).attr('Rut');
        nombreTM = $(this).text();
        $('.progress').slideDown('slow');
        $("#perfil").slideDown('slow').load("perfil/perfilGeneral.php", {"Rut": rut, 'nombreTM': nombreTM}, function() {
            $('.progress').slideUp('slow');
        });

    });
</script>
