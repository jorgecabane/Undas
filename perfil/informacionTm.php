<?php
include_once "../Include/isAdmin.php";
if ($_SESSION["usuario"]) {
	if (isAdmin($_SESSION["idusuario"],$_SESSION ["context"]) == 1) {
        $admin = 1;
    } else {
        $admin = 0;
    }
}
$resultado = mysql_query("SELECT * from tm WHERE Rut='$rut'") or die(mysql_error());
echo '<div align="center">';
if ($resultado) {
    echo "<table id='t01' class='table table-hover table-bordered'>";
    echo "<tbody>";
    while ($row = mysql_fetch_array($resultado)) {
    	$idtm=$row['idTM'];
    	$nombre=$row['Nombre'];
    	$apellido=$row['Apellido'];
    	$rut=$row['Rut'];
    	$mail=$row['Mail'];
    	$celular=$row['Celular'];
    	$banco=$row['Banco'];
    	$ctacorriente=$row['Cuentacorriente'];
    	$comentario=$row['Comentario'];
    	$segundonombre=$row['Segundonombre'];
    	$segundoapellido=$row['Segundoapellido'];
    	$idtm=$row['idTM'];
        ?>
        <tr>
        <th>Nombre</th>
            <td>
                <div class="form-group">
                    <input id="nombre" type="text" class="form-control editable"
                           name="Nombre" value="<?php echo $row['Nombre']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Segundo Nombre</th>
            <td>
                <div class="form-group">
                    <input id="segundonombre" type="text" class="form-control editable"
                           name="Segundonombre" value="<?php echo $row['Segundonombre']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Apellido</th>
            <td>
                <div class="form-group">
                    <input id="apellido" type="text" class="form-control editable"
                           name="Apellido" value="<?php echo $row['Apellido']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Segundo Apellido</th>
            <td>
                <div class="form-group">
                    <input id="segundoapellido" type="text" class="form-control editable"
                           name="Segundoapellido" value="<?php echo $row['Segundoapellido']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Rut</th>
            <td>
                <div class="form-group">
                    <input id="rut" type="text" class="form-control editable" name="Rut"
                           value="<?php echo $row['Rut']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Mail</th>
            <td>
                <div class="form-group">
                    <input id="mail" type="text" class="form-control editable"
                           name="Mail" value="<?php echo $row['Mail']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Celular</th>
            <td>
                <div class="form-group">
                    <input id="celular" type="number" class="form-control editable"
                           name="Celular" value="<?php echo $row['Celular']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Banco</th>
            <td>
                <div class="form-group">
                    <input id="banco" class="form-control editable"
                              name="banco" value="<?php echo $row['Banco']; ?>"
                              <?php
                              if ($admin == 0) {
                                  echo "disabled='disabled'";	
                              }
                              ?>
                              required></input>
                </div>
            </td>
            </tr>
            <tr>
            <th>Cta Corriente</th>
            <td>
                <div class="form-group">
                    <input id="cuenta" type="text" class="form-control editable"
                           name="cuenta" value="<?php echo $row['Cuentacorriente']; ?>"
                           <?php
                           if ($admin == 0) {
                               echo "disabled='disabled'";
                           }
                           ?>
                           required>
                </div>
            </td>
            </tr>
            <tr>
            <th>Comentario</th>
            <td>
                <div class="form-group">
                    <textarea id="comentario" class="form-control editable"  rows="4" cols="30"
                              name="comentario"
                              <?php
                              if ($admin == 0) {
                                  echo "disabled='disabled'";
                              }
                              ?>
                              required><?php echo $row['Comentario']; ?></textarea>
                </div>
            </td>
            </tr>
            <?php
            if ($admin == 1) {
                ?>    
				<tr>
                <td>
                    <div>
                        <input id="idtm" type="hidden" name="idtm" value="<?php echo $row['idTM']; ?>" />
                        <input type="submit" value="Guardar"
                               class='btn btn-info btnedit' disabled="disabled" />
						<input type="submit" value="Cancelar"
                               class='btn btn-warning btncancel' disabled="disabled" />                        
                    </div>
                </td>
            <td><input type="submit" value="Eliminar TM"
                       class='btn btn-danger btnerase'></td>
            </tr>
             <?php 
            }
    }
    ?>
    </tbody>
    </table>
    <?php
}
?>
</div>
<script>
    $(".editable").keyup(function() {
        $(".btnedit").removeAttr("disabled");
		$(".btncancel").removeAttr("disabled");
        $(this)
                .parent()
                .parent()
                .parent()
                .addClass("danger");
    });
</script>
<script>
    $(".btnedit").click(function() {
    	  var rut = "<?php echo $rut; ?>";
          var rut2 = $('#rut').val();
          var nombre = "<?php echo $nombre; ?>";
          var nombre2 = $('#nombre').val();
          var apellido = "<?php echo $apellido; ?>"; 
          var apellido2 =$('#apellido').val();
          var nombrecompleto =nombre+' '+apellido;
          var nombrecompleto2 =nombre2+' '+apellido2;
        jQuery.ajax({
            method: "POST",
            url: "querys/updateTm.php",
            data: {
                'idtm': $('#idtm').val(),
                'nombre': $('#nombre').val(),
                'apellido': $('#apellido').val(),
                'rut': $('#rut').val(),
                'mail': $('#mail').val(),
                'celular': $('#celular').val(),
                'banco': $('#banco').val(),
                'cuenta': $('#cuenta').val(),	
                'comentario': $('#comentario').val(),
                'segundonombre': $('#segundonombre').val(),
                'segundoapellido': $('#segundoapellido').val()
            },
            beforeSend: function() {
                $('.progress').slideDown('slow');
              },
            success: function(response)
            {
            	if(rut != rut2){
                 	 location.reload();  
                 }
                if(nombre != nombre2){
	                	$('.nombreevento').each(function(){
	                        if(nombrecompleto  == $(this).text()){
	                       	 $(this).html(nombrecompleto2);
	                            }                    
	                     });
                }
		                $(".btnedit").attr("disabled", "disabled");
		                $('tr.danger').removeClass("danger").addClass("success");
		                $('.progress').slideUp('slow');
            }
        });
    });
</script>
<script>
    $(".btnerase").click(function() {
        var r = confirm("Esta seguro que quiere eliminar a: " + $('#nombre').val() + ' ' + $('#apellido').val() + "? (SI ACEPTA SE PERDERA TODA LA INFORMACION)");
        if (r == true) {

            jQuery.ajax({
                method: "POST",
                url: "querys/eraseTM.php",
                data: {
                    'rut': $('#rut').val()
                },
                success: function(response)
                {
                    location.reload();
                }
            });
        }
    });
</script>
<script>
	$(".btncancel").click(function() {
         $("#nombre").val("<?php echo $nombre; ?>");
         $("#apellido").val("<?php echo $apellido; ?>");
         $("#rut").val("<?php echo $rut; ?>");
         $("#mail").val("<?php echo $mail; ?>");
         $("#celular").val("<?php echo $celular; ?>");
         $("#banco").val("<?php echo $banco; ?>");
         $("#cuenta").val("<?php echo $ctacorriente; ?>");	
         $("#comentario").val("<?php echo $comentario; ?>");
         $("#segundonombre").val("<?php echo $segundonombre; ?>");
         $("#segundoapellido").val("<?php echo $segundoapellido; ?>");

         $('tr.danger').removeClass("danger").addClass("warning");
         $('tr.success').removeClass("success").addClass("warning");
         $(".btncancel").attr("disabled", "disabled");
         $(".btnedit").removeAttr("disabled");
	});
</script>
