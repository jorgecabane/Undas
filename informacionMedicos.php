<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
include_once dirname(__FILE__) . "/querys/getMedicos.php";
?>

<div class="row">
	<div class="col-xs-10  col-xs-offset-1 text-center hidden-print">
		<label><h3>Editar o Borrar M&eacute;dicos</h3></label> 
		
		<?php 



    echo "<br>";
    echo "<div class = 'well'>";
    echo '<div class="table-responsive">';
	echo "<table class='table table-hover table-bordered table-condensed'>";
    echo "<thead><tr class='info'>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Guardar</th>";
    echo "<th>Cancelar</th>";
    echo "<th>Eliminar</th>";
    echo "</tr></thead><tbody>";

    //se buscan los medicos ya creados
    $medicos = getMedicos();
    if ($medicos) {//si hay
        foreach ($medicos as $medico) {
            echo'<tr>';
            
            echo'<td><input type="text" class="form-control nombre editar" value="'.$medico['Nombre'].'"></td>';
            echo'<td><input type="text" class="form-control apellido editar" value="'.$medico['Apellido'].'"></td>';
            echo '<td>';
            echo '<input type="submit" value="Editar" class="btn btn-info btnedit" idMedico="'.$medico['idTM'].'" disabled="disabled" />';
            echo '</td>';
    		echo'<td colspan="1">';
    		echo '<input type="submit" value="Cancelar" idMedico="'.$medico['idTM'].'" class="btn btn-warning btncancel" disabled="disabled"/>';
    		echo '<td><input type="button" value = "Eliminar" class=" btn btn-danger btnclose" idMedico="'.$medico['idTM'].'" aria-label="Close"/></td>';
            //echo '<strong class="medico" idMedico="'.$medico['idTM'].'">' . $medico['Nombre'] . " <span>" . $medico['Apellido'] . '</strong>';
            echo "</td></tr>";
        }
    } else {
        echo'<tr class="warning Oops"><td colspan="5">';
        echo '<strong>Oops!</strong> No existen M&eacute;dicos todav&iacute;a.';
        echo "</td></tr>";
    }

echo "</tbody></table></div></div>";

?>
</div></div>

<script>
    $('.btnclose').click(function() {
        var idMedico = $(this).attr('idMedico');
        var Nombre = $(this).parent().parent().find('.nombre').val();
        var Apellido = $(this).parent().parent().find('.apellido').val();
        var aqui = $(this).parent().parent();
        var r = confirm("Esta seguro que desea eliminar M�dico: " + Nombre + " " + Apellido +"?");
        if (r == true) {

            jQuery.ajax({
                method: "POST",
                url: "querys/eraseMedico.php",
                data: {
                    "id": idMedico
                },
                success: function(response)
                {
                    aqui.remove();
                }
            });
        }
    });
</script>
<script>

$(".editar").keyup(function() {
	//$(".btneditable").removeAttr("disabled");
	//solo se buscan los elementos de la fila seleccionada
	        var row = $(this).parent().parent();

	        row.find(".btnedit").removeAttr("disabled");
	        row.find(".btncancel").removeAttr("disabled");
	        row.addClass("danger");
	    });
$(".btnedit").click(function() {
    //solo se buscan los elementos de la fila seleccionada
    var row = $(this).parent().parent();
    var nombre = row.find(".nombre").val();
    var apellido = row.find(".apellido").val();
    var idMedico = $(this).attr('idMedico');
   

    jQuery.ajax({
        method: "POST",
        url: "querys/updateMedico.php",
        data: {
           
            'id': idMedico,
            'nombre': nombre,
            'apellido': apellido

        },
        success: function(response)
        {
            $(".btnedit").attr("disabled", "disabled");
            row   
                 .removeClass("danger")
                 .addClass("success");
        }//success
    });//ajax
});//click .btnedit
</script>
<script>
    $('.btncancel').click(function() {
    	location.reload();
    });
</script>

