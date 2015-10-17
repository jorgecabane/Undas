<div align="center">
    <?php
    include_once "../Include/isAdmin.php";
    if ($_SESSION ["usuario"]) {
        if (isAdmin($_SESSION ["idusuario"]) == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }
    }
    $resultado = mysql_query("SELECT * from empresa where idEmpresa=$idEmpresa") or die(mysql_error());

    if ($resultado) {

        echo "<table id='t01' class='table table-hover table-bordered'>";
        echo "<tbody>";
        while ($row = mysql_fetch_array($resultado)) {
        	$idempresa=$row['idEmpresa'];
        	$nombre=$row['Nombre'];
        	$rut=$row['Rut'];
        	$giro=$row['Giro'];
        	$direccion=$row['Direccion'];
        	$comuna=$row['Comuna'];
        	$ciudad=$row['Ciudad'];
        	$razonsocial=$row['RazonSocial'];
            ?>
            <tr>
            <th>Nombre</th>
                <td>
                    <div class="form-group">
                        <input id="nombre" type="text" class="form-control editable" name="Nombre" value="<?php echo $row['Nombre']; ?>"
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
                        <input id="rut" type="text" class="form-control editable" name="Rut" value="<?php echo $row['Rut']; ?>"
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
                <th>Giro</th>
                <td>
                    <div class="form-group">
                        <input id="giro" type="text" class="form-control editable" name="Giro" value="<?php echo $row['Giro']; ?>"
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
                <th>Direccion</th>
                <td>
                    <div class="form-group">
                        <input id="direccion" type="text" class="form-control editable" name="Direccion" value="<?php echo $row['Direccion']; ?>"
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
                <th>Comuna</th>
                <td>
                    <div class="form-group">
                        <input id="comuna" type="text" class="form-control editable" name="Comuna" value="<?php echo $row['Comuna']; ?>"
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
                <th>Ciudad</th>
                <td>
                    <div class="form-group">
                        <input id="ciudad" type="text" class="form-control editable" name="Ciudad" value="<?php echo $row['Ciudad']; ?>"
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
                <th>Razon social</th>
                <td>
                    <div class="form-group">
                        <input id="razonsocial" type="text" class="form-control editable" name="Razonsocial" value="<?php echo $row['RazonSocial']; ?>"
                        <?php
                        if ($admin == 0) {
                            echo "disabled='disabled'";
                        }
                        ?>
                               required>
                    </div>
                </td>
                </tr>
                <?php
                if ($admin == 1) {
                    ?>
                    <tr>
                    <td>
                        <div>
                            <input type="hidden" id="idempresa" name="idempresa" value="<?php echo $row['idEmpresa']; ?>" />
                            <input type="submit" value="Guardar" class='btn btn-info btnedit' disabled="disabled" />
                            <input type="submit" value="Cancelar" class='btn btn-warning btncancel' disabled="disabled" />        
                        </div>
                    </td>
                    </td>
                    <td><input type="submit" value="Eliminar Empresa"
                               class='btn btn-danger btnerase'></td>
                </tr> <?php
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
            url: "querys/updateEmpresas.php",
            data: {
                'idempresa': $('#idempresa').val(),
                'nombre': $('#nombre').val(),
                'rut': $('#rut').val(),
                'giro': $('#giro').val(),
                'direccion': $('#direccion').val(),
                'comuna': $('#comuna').val(),
                'ciudad': $('#ciudad').val(),
                'razonsocial': $('#razonsocial').val()
            },
            success: function(response)
            {
                $(".btnedit").attr("disabled", "disabled");
                $('tr.danger').removeClass("danger").addClass("success");
            }
        });
    });
</script>
<script>
    $(".btnerase").click(function() {
        var r = confirm("Esta seguro que quiere eliminar a: " + $('#nombre').val() + "?");
        if (r == true) {
            jQuery.ajax({
                method: "POST",
                url: "querys/eraseEmpresa.php",
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