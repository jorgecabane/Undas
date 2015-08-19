<?php include_once dirname(__FILE__)."/../conexionLocal.php";
		?>
     
  
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT Centro.nombre as nombrecentro, Centro.siglas as siglas, Ecos.nombre as nombreeco, Ecos.color as coloreco
						  from Centro
						  Inner join Ecos on (Centro.idCentro=Ecos.Centro_idCentro)
						  where Empresa_idEmpresa=$idEmpresa") or die(mysql_error());

if($resultado){

echo "<table id='t01' class='table table-hover table-bordered'>"; 
echo "<thead><tr>";
  echo  "<th>Nombre</th>";
  echo  "<th>Siglas</th>";
  echo  "<th>Ecos</th>";
  echo  "<th>Color</th>";
if ($admin == 1) {
						echo "<th>Editar</th>";
						echo "<th>Eliminar</th>";
					}
  echo "</thead><tbody>";
while ($row = mysql_fetch_array($resultado)) {
	?>
	            <tr>
			<td>
				<div class="form-group">
					<input id="nombre" type="text" class="form-control editable" name="Nombre" value="<?php echo $row['nombrecentro']; ?>"
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
					<input id="siglas" type="text" class="form-control editable" name="Siglas" value="<?php echo $row['siglas']; ?>"
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
					<input id="ecos" type="text" class="form-control editable" name="Ecos" value="<?php echo $row['nombreeco']; ?>"
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
					<input id="siglas" type="text" class="form-control editable" name="Siglas" value="<?php echo $row['coloreco']; ?>"
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
					<input type="hidden" name="id" value="<?php echo $row['idCentro']; ?>" />
					<input type="submit" value="Finalizar edicion"
						class='btn btn-info btneditcentro' disabled="disabled" />
				</div>
			</td>
			</td>
			<td><input type="submit" value="Eliminar TM"
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
	        $(".btneditcentro").removeAttr("disabled");
	
	        $(this)
	                .parent()
	                .parent()
	                .parent()
	                .addClass("danger");
	    });
	</script>
	<script>
	    $(".btneditcentro").click(function() {
				jQuery.ajax({
	            method: "POST",
	            url: "querys/updateCentro.php",
	            data: {
	                'nombre': $('#nombre').val(),
	                'siglas': $('#siglas').val()
	            },
	            success: function(response)
	            {
	                $(".btneditcentro").attr("disabled", "disabled");
	                $(".btneditcentro")
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
	                url: "querys/eraseCentro.php",
	                data: {
	                    'nombre': $('#nombre').val()
	                },
	                success: function(response)
	                {
	                    location.reload();
	                }
	            });
	        }
	    });
	</script>
	