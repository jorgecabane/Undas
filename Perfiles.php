<?php
session_start();
include "header.php";
include_once "include/verificacionUsuario.php";
?>
<div class="container-fluid">
    <div class="row well well-titles">
        <h3>
            <center>Perfiles Tecnologos Medicos</center>
        </h3>
    </div>


    <div class="row">

        <?php
        // si es admin ve esto
        if ($admin == 1) {
            ?>
            <div class="col-sm-2 well well-sm">

                <h4>Busque por TM</h4>

                <input id="search" class="form-control" type="text" name="valor"
                       placeholder="Filtre por TM" />

                <hr><!-- divisor-->
                <div id="listado">

                    <!-- aqui iria una tabla de todos los tms en caso de lata de buscar -->
                    <?php
                    if ($admin == 1) {
                        include "querys/todosTmListado.php";
                    }
                    ?>
                </div>

            </div>
            <?php
        }
        ?>

        <?php
// si no admin ve esto
        if ($admin == 0) {
            echo '<div class="col-sm-12" id="perfil">';
        } else {
            echo '<div class="col-sm-10" id="perfil">
            <div class="alert alert-info"><center><h4>Por favor seleccione un TM del listado de la izquierda para ver su informaci&oacute;n</h4></center></div>';
        }
        ?>

        <!-- aqui va perfil -->
    </div><!-- cierre perfil -->
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
} elseif ($admin == 0) {

    $sessionrut = $_SESSION ['idusuario'];

    $query = "SELECT Rut, Nombre, Apellido FROM TM WHERE idTM=$sessionrut";

    $res = mysql_query($query) or die(mysql_error());

    $row = mysql_fetch_assoc($res);
    $Rut = $row["Rut"];
    $nombreTM = $row['Nombre'].' '.$row['Apellido'];

    echo "<script>
		$('#perfil').slideDown('1000').load( 'perfil/perfilGeneral.php' , {'Rut': $Rut, 'nombreTM': '$nombreTM'} );
	  </script>";

}
?>

<script src="include/filtro.js"></script>

<script>
    $(".fc-event").click(function() {
        $("#perfil").slideDown('2000').load("perfil/perfilGeneral.php", {"Rut": $(this).attr('Rut'), 'nombreTM': $(this).text()});

    });
</script>