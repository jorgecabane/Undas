<?php 
session_start();
?>
    <section class="productList">
        </head>
        <body>
            <div>
                <?php
                include_once "../Include/isAdmin.php";
                include_once "../querys/getPrestaciones.php";
                include_once "../querys/getAllPrestaciones.php";
                
                
                if ($_SESSION ["usuario"]) {
                    if (isAdmin($_SESSION ["idusuario"]) == 1) {
                        $admin = 1;
                       
                    } else {
                        $admin = 0;
                    }
                }
                $rut = $_POST['rut'];
                $empresa = $_POST['empresa'];
                if($admin == 1){
                echo "<input type='submit' value='Agregar Prestacion' class='btn btn-info btnprestaciones' />";
                echo "<table id='appendPrestaciones' class='table table-hover table-bordered table-condensed'>";
                echo "<thead><tr>";
                echo "<th>Prestacion</th>";
                echo "<th>Guardar</th>";
                echo "<th>Cancelar</th>";
                echo "</thead><tbody></tbody></table>";
                }
                $prestaciones= getPrestaciones($rut,$empresa);
                if($prestaciones){
                foreach($prestaciones as $prestacion)
                {
                	echo'<div class="alert alert-warning" role="alert">';
                	if($admin==1){
                	echo '<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                	}
                	echo '<strong class="nombrePrestacion">'. $prestacion['Grupo'] . ": <span class='especifico'>" .$prestacion['Especifico']. '</span></strong>';
                	echo "</div>";
                }
                }
                else 
                {
                	echo'<div class="Oops alert alert-warning" role="alert">';
                	echo '<strong>Oops!</strong> TM no tiene prestaciones asociadas en esta empresa.';
                	echo "</div>";
                }
                
        ?>
            
                    
            </div>
        </body>
    </section>

<script>

    $(".btnprestaciones").click(function() {
       
        var content = "<tr><td><select class='form-control Prestacion' required name='Prestacion'>";
        content += "<option selected='true' disabled='disabled'> Seleccione Prestacion </option><?php
                    foreach (getPrestacion($rut,$empresa) as $contenido) {
                        echo "<option value='" . $contenido["idPrestacion"] . "'> " . $contenido["Grupo"] . " " . $contenido["Especifico"] . '</option>'; 
                    }
                    ?>";
        content += "</select></td>";
        content += "<td><input type='submit' value='Guardar' class='btn btn-info btnguardarPrestacion' /></td>";
        content += "<td><input type='submit' value='Cancelar' class='btn btn-danger btncancelarPrestacion' /></td></tr>";
        $('#appendPrestaciones').prepend(content);
        $(".btncancelarPrestacion").bind('click', function() {
            $(this).parent().parent().remove();
        });

        $(".btnguardarPrestacion").bind('click', function() {
            $(this).parent().parent().find('.btnguardarPrestacion').attr("value", "Guardado Exitoso");
            $(this).parent().parent().find('.btnguardarPrestacion').attr("disabled", "disabled");
            $(this).parent().parent().find('.btnguardarPrestacion').attr("class", "btn btn-success btnguardar");
            $(this).parent().parent().find('.btncancelarPrestacion').attr("disabled", "disabled");
            var select = $(this).parent().parent().find(".Prestacion");
            var idPrestacion = $(this).parent().parent().find(".Prestacion").val();
      
            jQuery.ajax({
                method: "POST",
                url: "querys/insertPrestacion.php",
                data: {
                    "idPrestacion": idPrestacion,
                    "idEmpresa":" <?php echo $empresa; ?>",
                    "idTM": "<?php echo $rut; ?>"
                },
                success: function(response)
                {
                    select.attr("disabled", "disabled");
                    $('.Oops').hide();
                }
            });
        });
    });

</script>

<script>
$('.close').click(function(){
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