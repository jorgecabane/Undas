<?php
include_once dirname(__FILE__) . "/../conexionLocal.php";
include_once dirname(__FILE__) . "/../querys/getEcosGroup.php";
?>
<div align="center" >
    <?php
//while ($row = mysql_fetch_array($resultado)) {
    $datosCentro = getEcosGroup($idEmpresa);

foreach($datosCentro AS $Centro){
        ?>
<div class="table-responsive">
        <table id='t01' class='table table-hover table-bordered'>
            <thead><tr class='info'>
                    <th>Nombre Centro</th>
                    <th>Siglas</th>
                    <?php
                    if ($admin == 1) {
                        echo "<th>Editar</th><th>Eliminar</th>";
                    }
                    ?>
            </thead><tbody>
                <tr idCentro="<?php echo $Centro['idCentro'];?>" class="trCentro">
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control nombrecentro editable" idcentro='<?php echo $Centro['idCentro']; ?>' name="nombrecentro" value="<?php echo $Centro['Nombre']; ?>"
                            <?php
                            if ($admin == 0) {
                                echo "disabled='disabled'";
                            }
                            ?>
                                   required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input  type="text" class="form-control siglascentro editable" idcentro='<?php echo $Centro['idCentro']; ?>' name="siglascentro" value="<?php echo $Centro['Siglas']; ?>"
                            <?php
                            if ($admin == 0) {
                                echo "disabled='disabled'";
                            }
                            ?>
                                   required>
                        </div>
                    </td>
                    <?php
                    if ($admin == 1) {
                        ?>
                        <td>
                            <div>
                               <input type="submit" value="Guardar" class='btn btn-info btneditcentro' disabled="disabled" />
                            </div>
                        </td>
                        </td>
                        <td><input type="submit" value="Eliminar Centro"
                                   class='btn btn-danger btnerasecentro'></td>
                    </tr> <?php } ?>
                </tr>
            <thead><tr>
                    <th>Nombres Ecos</th>
                    <th>Color</th>
            </thead><tbody>

        <?php	foreach ($Centro['Ecos'] as $dataEco) {
                		?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control nombreeco editable" ideco='<?php echo $dataEco['idEcos']; ?>' name="nombreeco" value="<?php echo $dataEco['Nombre']; ?>"
                                <?php
                                if ($admin == 0) {
                                    echo "disabled='disabled'";
                                }
                                ?>
                                       required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="color" class="form-control coloreco " ideco='<?php echo $dataEco['idEcos']; ?>' name="coloreco" value="<?php echo $dataEco['color']; ?>"
                                       <?php
                                       if ($admin == 0) {
                                           echo "disabled='disabled'";
                                       }
                                       ?>
                                       required>
                            </div>
                        </td>
                         <?php
                    if ($admin == 1) {
                        ?>
                        <td>
                            <div>
                                <input type="submit" value="Guardar" class='btn btn-info btnediteco ' disabled="disabled" />
                                <input type="submit" value="Cancelar" class='btn btn-warning btncancelcentro' disabled="disabled" />
                            </div>
                        </td>
                        </td>
                        <td><input type="submit" value="Eliminar Eco"
                                   class='btn btn-danger btneraseeco'></td>
                    </tr> <?php } ?>
                    </tr>
                    <?php
                }
			}
            ?>
        </tbody>
    </table>
    </div>
</div>
<script>
    $(".editable").keyup(function() {
        $(this).parent().parent().parent().find('.btneditcentro').removeAttr("disabled");
        $(this)
                .parent()
                .parent()
                .parent()
                .addClass("danger");
    });

</script>
<script>
    $(".editable").keyup(function() {
        $(this).parent().parent().parent().find('.btnediteco').removeAttr("disabled");
        $(this)
                .parent()
                .parent()
                .parent()
                .addClass("danger");
    });

</script>
<script>
    $(".coloreco").change(function() {
    	$(this).parent().parent().parent().find('.btnediteco').removeAttr("disabled");
        $(this)
                .parent()
                .parent()
                .parent()
                .addClass("danger");
    });

</script>
<script>
    $(".btneditcentro").click(function() {
      var idcentro = $(this).parent().parent().parent().find('.nombrecentro').attr('idcentro');
      var nombrecentro = $(this).parent().parent().parent().find('.nombrecentro').val();
      var siglas = $(this).parent().parent().parent().find('.siglascentro').val();
      var btn = $(this).parent().parent().parent().find('.btneditcentro');
      var row = $(this).parent().parent().parent();
        jQuery.ajax({
            method: "POST",
            url: "querys/updateCentro.php",
            data: {
                'idcentro' : idcentro,
                'nombre' : nombrecentro,
                'siglas' : siglas
            },
            beforeSend: function() {
                $('.progress').slideDown('slow');
              },
            success: function(response)
            {
                btn.attr("disabled", "disabled");
                row.removeClass("danger").addClass("success");
                $('.progress').slideUp('slow');
            }
        });
    });
</script>
<script>
    $(".btnediteco").click(function() {
      var ideco = $(this).parent().parent().parent().find('.nombreeco').attr('ideco');
      var nombreeco = $(this).parent().parent().parent().find('.nombreeco').val();
      var color = $(this).parent().parent().parent().find('.coloreco').val();
      var btn = $(this).parent().parent().parent().find('.btnediteco');
      var row = $(this).parent().parent().parent();
        jQuery.ajax({
            method: "POST",
            url: "querys/updateEco.php",
            data: {
                'ideco' : ideco,
                'nombre' : nombreeco,
                'color' : color
            },
            beforeSend: function() {
                $('.progress').slideDown('slow');
              },
            success: function(response)
            {
                btn.attr("disabled", "disabled");
                row.removeClass("danger").addClass("success");
                $('.progress').slideUp('slow');
            }
        });
    });
</script>
<script>
    $(".btnerasecentro").click(function() {
    	var row = $(this).parent().parent().parent().parent();
    	var idcentro = $(this).parent().parent().find('.nombrecentro').attr('idcentro');
    	var nombre = $(this).parent().parent().find('.nombrecentro').val();
        var r = confirm("Esta seguro que quiere eliminar el centro: " + nombre + "? (SI ACEPTA SE PERDERA TODA LA INFORMACION)");
        if (r == true) {
             jQuery.ajax({
                method: "POST",
                url: "querys/eraseCentro.php",
                data: {
                    'idcentro': idcentro
                },
                success: function(response)
                {
                	if(response == "fail"){
                  		 alert("No se puede borrar el centro ya que se perdera el registro de las ecos asociadas");
   					}
   					else{
   						row.hide();
   					}
                }
            });
        }
    });
</script>
<script>
    $(".btneraseeco").click(function() {
        var row = $(this).parent().parent();
    	var ideco = $(this).parent().parent().find('.nombreeco').attr('ideco');
    	var nombre = $(this).parent().parent().find('.nombreeco').val();
        var r = confirm("Esta seguro que quiere eliminar a: " + nombre + "? (SI ACEPTA SE PERDERA TODA LA INFORMACION");
        if (r == true) {
             jQuery.ajax({
                method: "POST",
                url: "querys/eraseEco.php",
                data: {
                    'ideco': ideco
                },
                success: function(response)
                {
					if(response == "fail"){
               		 alert("No se puede borrar la eco ya que se perdera el registro de eventos asociados");
					}
					else{
						row.hide();
					}
                }
            });
        }
    });
</script>
<script>
	$(".btncancel").click(function() {
         $("#nombre").val("<?php echo $nombre; ?>");
         $("#rut").val("<?php echo $rut; ?>");
         $("#giro").val("<?php echo $giro; ?>");
         $("#direccion").val("<?php echo $direccion; ?>");
         $("#comuna").val("<?php echo $comuna; ?>");
         $("#ciudad").val("<?php echo $ciudad; ?>");
         $("#razonsocial").val("<?php echo $razonsocial; ?>");
         $('tr.danger').removeClass("danger");

         $(".btnedit").attr("disabled", "disabled");
         $(".btncancel").attr("disabled", "disabled");
	});
</script>
