<?php
include_once dirname ( __FILE__ ) . "/../conexionLocal.php";
?>


<div align="center">
            <?php
												
												$resultado = mysql_query ( "SELECT * from Empresa where idEmpresa=$idEmpresa" ) or die ( mysql_error () );
												
												if ($resultado) {
													
													echo "<table id='t01' class='table table-hover table-bordered'>";
													echo "<thead><tr>";
													echo "<th>Nombre</th>";
													echo "<th>Rut</th>";
													echo "<th>Giro</th>";
													echo "<th>Direccion</th>";
													echo "<th>Comuna</th>";
													echo "<th>Ciudad</th>";
													echo "<th>Razon Social</th>";
													echo "<th>Editar Empresa</th>";
													
													echo "<th>Eliminar</th></thead><tbody>";
													while ( $row = mysql_fetch_array ( $resultado ) ) {
														
														echo "<tr>";
														?>
	<td>
		<div class="form-group">
			<input id="nombre" type="text" class="form-control editable"
				name="Nombre" value="<?php echo $row['Nombre']; ?>" required>
		</div>
	</td>
		<td>
		<div class="form-group">
			<input id="rut" type="text" class="form-control editable"
				name="rut" value="<?php echo $row['Rut']; ?>" required>
		</div>
	</td>
	<td>
			<div class="form-group">
				<textarea id="giro" class="form-control editable"  rows="2" cols="30"
					name="giro" value="<?php echo $row['Giro']; ?>"
							required> <?php echo $row['Giro']; ?></textarea>
			</div>
		</td>
	<td>
		<div class="form-group">
			<input id="direccion" type="text" class="form-control editable"
				name="direccion" value="<?php echo $row['Direccion']; ?>" required>
		</div>
	</td>
	<td>
		<div class="form-group">
			<input id="comuna" type="text" class="form-control editable"
				name="comuna" value="<?php echo $row['Comuna']; ?>" required>
		</div>
	</td>
	<td>
		<div class="form-group">
			<input id="ciudad" type="text" class="form-control editable"
				name="ciudad" value="<?php echo $row['Ciudad']; ?>" required>
		</div>
	</td>
	<td>
			<div class="form-group">
				<textarea id="razon" class="form-control editable"  rows="2" cols="30"
					name="razon" value="<?php echo $row['RazonSocial']; ?>"
							required> <?php echo $row['RazonSocial']; ?></textarea>
			</div>
		</td>
  		
            <td><input type="hidden" name="id"
		value="<?php echo $row['idEmpresa']; ?>" /> <input type="submit"
		value="Editar Empresa" class='btn btn-info btnedit' disabled="disabled"  /></td>

	<td><input type="hidden" name="id"
		value="<?php echo $row['idEmpresa']; ?>" /> <input type="submit"
		value="Eliminar" class='btn btn-danger btnerase' /></td>
     <?php
														
														echo "</tr>";
													}
													echo "</tbody></table>";
												}
												?>
 </div>
 
 <script>
    $(".editable").keyup(function() {
        $(".btnedit").removeAttr("disabled");

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
            url: "querys/updateEmpresa.php",
            data: {
            	'nombre': $('#nombre').val(),
                'rut': $('#rut').val(),
                'giro': $('#giro').val(),
                'direccion': $('#direccion').val(),
                'comuna': $('#comuna').val(),
                'ciudad': $('#ciudad').val(),
                'razon': $('#razon').val()
                
            },
            success: function(response)
            {
                $(".btnedit").attr("disabled", "disabled");
                $(".btnedit")
                        .parent()
                        .parent()
                        .removeClass("danger")
                        .addClass("success");
            }

        });


    });

</script>

<script>
    $(".btnerase").click(function() {


        var r = confirm("Esta seguro que quiere eliminar a: " + $('#nombre').val() + " ?");
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
 