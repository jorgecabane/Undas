<div align="center">
    <?php
				include_once "../include/isAdmin.php";
				if ($_SESSION ["usuario"]) {
					if (isAdmin ( $_SESSION ["idusuario"] ) == 1) {
						$admin = 1;
					} else {
						$admin = 0;
					}
				}
$resultado = mysql_query("SELECT * from Empresa where idEmpresa=$idEmpresa") or die(mysql_error());

if($resultado){

echo "<table id='t01' class='table table-hover table-bordered'>"; 
echo "<thead><tr>";
  echo  "<th>Nombre</th>";
  echo  "<th>Rut</th>";
  echo  "<th>Giro</th>" ;
  echo  "<th>Direccion</th>";
  echo  "<th>Comuna</th>";
  echo  "<th>Ciudad</th>";
  echo  "<th>Razon social</th>";
if ($admin == 1) {
						echo "<th>Editar</th>";
						echo "<th>Eliminar</th>";
					}
  echo  "</thead><tbody>";
while ($row = mysql_fetch_array($resultado)) {
	?>
	            <tr>
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
	            <?php
				if ($admin == 1) {
				?>
	            <td>
				<div>
					<input type="hidden" name="id" value="<?php echo $row['idEmpresa']; ?>" />
					<input type="submit" value="Finalizar edicion"
						class='btn btn-info btnedit' disabled="disabled" />
				</div>
			</td>
			</td>
			<td><input type="submit" value="Eliminar Empresa"
				class='btn btn-danger btnerase'></td>
		</tr> <?php }
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
	                $(".btnedit")
	                        .parent()
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
