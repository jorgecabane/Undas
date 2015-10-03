<?php
include_once "../Include/isAdmin.php";
if ($_SESSION["usuario"]) {
    if (isAdmin($_SESSION["idusuario"]) == 1) {
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
    	$nombre=$row['Nombre'];
    	$apellido=$row['Apellido'];
    	$rut=$row['Rut'];
    	$mail=$row['Mail'];
    	$celular=$row['Celular'];
    	$banco=$row['Banco'];
    	$ctacorriente=$row['Cuentacorriente'];
    	$comentario=$row['Comentario'];
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
                        <input id="id" type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
                        <input type="submit" value="Finalizar edicion"
                               class='btn btn-info btnedit' disabled="disabled" />
						<input type="submit" value="Cancelar edicion"
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
        jQuery.ajax({
            method: "POST",
            url: "querys/updateTM.php",
            data: {
                'id': $('#id').val(),
                'nombre': $('#nombre').val(),
                'apellido': $('#apellido').val(),
                'rut': $('#rut').val(),
                'mail': $('#mail').val(),
                'celular': $('#celular').val(),
                'banco': $('#banco').val(),
                'cuenta': $('#cuenta').val(),	
                'comentario': $('#comentario').val()
            },
            success: function(response)
            {
		                $(".btnedit").attr("disabled", "disabled");
		                $(".btnedit").attr("disabled", "disabled");
		                $('tr.danger').removeClass("danger").addClass("success");
            }
        });
    });
</script>
<script>
    $(".btnerase").click(function() {
        var r = confirm("Esta seguro que quiere eliminar a: " + $('#nombre').val() + ' ' + $('#apellido').val() + "?");
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
         $('tr.danger').removeClass("danger");

         $(".btnedit").attr("disabled", "disabled");
         $(".btncancel").attr("disabled", "disabled");
	});
</script>
