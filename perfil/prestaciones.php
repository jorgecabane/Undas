<?php
session_start();
include_once "../Include/isAdmin.php";
include_once "../querys/getPrestaciones.php";
//include "../querys/getAllPrestaciones.php";


if ($_SESSION["usuario"]) {
    if (isAdmin($_SESSION["idusuario"]) == 1) {
        $admin = 1;
    } else {
        $admin = 0;
    }
}
$rut = $_POST['rut'];
$empresa = $_POST['empresa'];
if ($admin == 1) {
    echo "<input type='submit' value='Agregar Prestaci&oacute;n' class='btn btn-info btnprestaciones' />";
    echo "<div><br></div>";
    echo "<table id='appendPrestaciones' class='table table-hover table-bordered table-condensed'>";
    echo "<thead><tr class='info'>";
    echo "<th class='rellenar'>Prestaciones</th>";
    echo "<th>Guardar</th>";
    echo "<th>Cancelar</th>";
    echo "</thead><tbody>";

    //se buscan las prestaciones ya asignadas
    $prestaciones = getPrestaciones($rut, $empresa);
    if ($prestaciones) {//si hay
        foreach ($prestaciones as $prestacion) {
            echo'<tr><td colspan="3">';
            if ($admin == 1) {
                echo '<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            }
            echo '<strong class="nombrePrestacion">' . $prestacion['Grupo'] . ": <span class='especifico'>" . $prestacion['Especifico'] . '</span></strong>';
            echo "</td></tr>";
        }
    } else {
        echo'<tr class="warning Oops"><td colspan="3">';
        echo '<strong>Oops!</strong> TM no tiene prestaciones asociadas en esta empresa.';
        echo "</td></tr>";
    }
}
if($admin == 0 ){
	echo "<table id='appendPrestaciones' class='table table-hover table-bordered table-condensed'>";
	echo "<thead><tr>";
	echo "<th class='rellenar info'>Prestaciones</th>";
	echo "</thead><tbody>";
	
	//se buscan las prestaciones ya asignadas
	$prestaciones = getPrestaciones($rut, $empresa);
	if ($prestaciones) {//si hay
		foreach ($prestaciones as $prestacion) {
			echo'<tr><td colspan="3">';
			if ($admin == 1) {
				echo '<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			}
			echo '<strong class="nombrePrestacion">' . $prestacion['Grupo'] . ": <span class='especifico'>" . $prestacion['Especifico'] . '</span></strong>';
			echo "</td></tr>";
		}
	} else {
		echo'<tr class="warning Oops"><td colspan="3">';
		echo '<strong>Oops!</strong> TM no tiene prestaciones asociadas en esta empresa.';
		echo "</td></tr>";
	}
	
}

echo "</tbody></table>";

?>
<script>
//script para ponerle el nombre en la tabla
$( document ).ready(function() {	
	var option = $("select#empresa option:selected").text();
$('.rellenar').html("Prestaciones  "+ option);
		});
</script>
<script>
function PopulateSelect(rutTM, idEmpresa){
	 $.ajax({
         method: "POST",
         url: "querys/getAllPrestaciones.php",
         data: { 
             'rut': rutTM, 
             'idEmpresa': idEmpresa 
             },
         success: function(data){
             // Parse the returned json data
             var opts = $.parseJSON(data);
             // Use jQuery's each to iterate over the opts value
             $.each(opts, function(i, d) {
                 // Get the right values from json object.
                 $('.Prestaciones').append('<option value="'+ d.idPrestacion+ '">' + d.Grupo + ' ' + d.Especifico + '</option>');
       
             });
         }
     });
}
</script>
<script>

    $(".btnprestaciones").click(function() {
    
    	
        var content = "<tr><td><select class='form-control Prestaciones' required name='Prestaciones'>";
        content += "<option selected='true' disabled='disabled'> Seleccione Prestacion </option>";
        content += "</select></td>";
        content += "<td><input type='submit' value='Guardar' class='btn btn-info btnguardarPrestacion' /></td>";
        content += "<td><input type='submit' value='Cancelar' class='btn btn-danger btncancelarPrestacion' /></td></tr>";
        $('#appendPrestaciones').prepend(content);
        $(".btncancelarPrestacion").bind('click', function() {
            $(this).parent().parent().remove();
        });

 var idEmpresa= <?php echo $empresa; ?>;
 var rutTM= "<?php echo $rut; ?>";
PopulateSelect(rutTM, idEmpresa);

        $(".btnguardarPrestacion").bind('click', function() {
            $(this).parent().parent().find('.btnguardarPrestacion').attr("value", "Guardado Exitoso");
            $(this).parent().parent().find('.btnguardarPrestacion').attr("disabled", "disabled");
            $(this).parent().parent().find('.btnguardarPrestacion').attr("class", "btn btn-success btnguardar");
            $(this).parent().parent().find('.btncancelarPrestacion').attr("disabled", "disabled");
            var select = $(this).parent().parent().find(".Prestaciones");
            var idPrestacion = $(this).parent().parent().find(".Prestaciones").val();
            var row = $(this).parent().parent(); //linea en la que se encuentra
            var prestacion = $(".Prestaciones :selected").text();
            row.html('<td colspan="3"><button type="button" class="close borrar"  aria-label="Close"><span aria-hidden="true">&times;</span></button><strong class="nombrePrestacion">' + prestacion + '</strong></td>');
            jQuery.ajax({
                method: "POST",
                url: "querys/insertPrestacion.php",
                data: {
                    "idPrestacion": idPrestacion,
                    "idEmpresa": " <?php echo $empresa; ?>",
                    "idTM": "<?php echo $rut; ?>"
                },
                success: function(response)
                {
                   row.toggleClass('success');
                   $('.Oops').remove();
                }
            });

            $('.borrar').click(function() {
               // var prestacion = $(this).parent().find('.nombrePrestacion').text();
                var aqui = $(this).parent();
               
                var r = confirm("Esta seguro que quiere eliminar Prestacion: " + prestacion + "?");
                if (r == true) {

                    jQuery.ajax({
                        method: "POST",
                        url: "querys/erasePrestacion.php",
                        data: {
                            "rut": "<?php echo $rut; ?>",
                            'idPrestacion': idPrestacion	
                        },
                        success: function(response)
                        {
                            aqui.remove();
                        }
                    });
                }
            });
        });

       
    });

</script>


<script>
    $('.close').click(function() {
        var prestacion = $(this).parent().find('.nombrePrestacion').text();
        var aqui = $(this).parent();
        var especifico = aqui.find('.especifico').text();
        var r = confirm("Esta seguro que quiere eliminar Prestacion: " + prestacion + "?");
        if (r == true) {

            jQuery.ajax({
                method: "POST",
                url: "querys/erasePrestacion.php",
                data: {
                    "rut": "<?php echo $rut; ?>",
                    'especifico': especifico
                },
                success: function(response)
                {
                    aqui.remove();
                }
            });
        }
    });
</script>

