<?php
session_start();
include_once "../Include/isAdmin.php";
include_once "../querys/getPrestaciones.php";
//include "../querys/getAllPrestaciones.php";


if ($_SESSION["usuario"]) {
	if (isAdmin($_SESSION["idusuario"],$_SESSION ["context"]) == 1) {
        $admin = 1;
    } else {
        $admin = 0;
    }
}
$rut = $_POST['rut'];
$empresa = $_POST['empresa'];

 
    echo "<br><div class='table-responsive'><table id='appendPrestaciones' class='table table-hover table-bordered table-condensed'>";
    echo "<thead><tr class='info'>";
    echo "<th class='rellenar'>Prestaciones</th>";
    echo "<th>Activo</th>";
    echo "</thead><tbody>";

    //se buscan las prestaciones ya asignadas
    $prestaciones = getPrestacionesNull($rut, $empresa);
    if ($prestaciones) {//si hay
        foreach ($prestaciones as $prestacion) {
        	if(is_null($prestacion['Empresa'])){
            echo'<tr>';
        	}
        	else{
        	echo'<tr class="warning">';
        	}
                echo '<td><strong class="nombrePrestacion">' . $prestacion['Grupo'] . ": <span class='especifico'>" . $prestacion['Especifico'] . '</span></strong></td>';
                if ($admin != 1) {
                	//si no soy admin no puedo clickearlo
                	if(is_null($prestacion['Empresa']))
                	{   //si no tengo esta prestacion asociada
                		echo '<td><input type="checkbox" value="" disabled></td>';
                	}
                	else { //si tengo esta prestacion asociada
                		echo '<td><input type="checkbox" value="" disabled checked></td>';
                	}
             	
            }
            else {
            	//si soy admin puedo editar
            	if(is_null($prestacion['Empresa']))
                	{   //si no tengo esta prestacion asociada
                		echo '<td><input type="checkbox" value="'.$prestacion['idprestacion'].'" class="btnguardarPrestacion"></td>';
                	}
                	else { //si tengo esta prestacion asociada
                		echo '<td><input type="checkbox" value="'.$prestacion['idprestacion'].'" checked class="btnguardarPrestacion"></td>';
                	}
            }
            echo "</tr>";
        }
    }

echo "</tbody></table></div>";

?>
<script>
//script para ponerle el nombre en la tabla
$( document ).ready(function() {	
	var option = $("select#empresa option:selected").text();
$('.rellenar').html("Prestaciones  "+ option);
		});
</script>
<script>

    $(".btnguardarPrestacion").click(function() {
        
    	 var idEmpresa= "<?php echo $empresa; ?>";
    	 var rutTM= "<?php echo $rut; ?>";

    	var checkbox = $(this);
        var idPrestacion = checkbox.val();
        var row = checkbox.parent().parent(); //linea en la que se encuentra
        var prestacion = row.find('.nombrePrestacion').text();
        
    	if( $(this).is(':checked') ){
        	// si deseo guardar una prestacion nueva 
            jQuery.ajax({
            method: "POST",
            url: "querys/insertPrestacion.php",
            data: {
                "idPrestacion": idPrestacion,
                "idEmpresa": idEmpresa,
                "idTM": rutTM
            },
            success: function(response)
            {
               row.toggleClass('success');
            }
        });        
    	}
    	
    	else{
    		// si ya esta checkeado y le hago click esto es null entonces tengo que borrar prestacion
    			 checkbox.removeAttr('checked');
               //  var r = confirm("Esta seguro que quiere eliminar Prestacion: " + prestacion + "?");
                 //if (r) {
                     jQuery.ajax({
                         method: "POST",
                         url: "querys/erasePrestacion.php",
                         data: {
                             "rut": rutTM,
                             'idPrestacion': idPrestacion	
                         },
                         success: function(response)
                         {		                      
                        	 row.toggleClass('danger');
                         }
                     });
               //  } 
               //  if (r == false){
               //      checkbox.attr('checked','checked');
                // }
    	} 
    });
</script>


