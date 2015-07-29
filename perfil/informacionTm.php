<center>
	<section class="productList">
		</head>
		<body>
			<div align="center">
            <?php
												include_once "../include/isAdmin.php";
												session_start ();
												if ($_SESSION ["usuario"]) {
													if (isAdmin ( $_SESSION ["idusuario"] ) == 1) {
														$admin = 1;
													} else {
														$admin = 0;
													}
												}
												
												$resultado = mysql_query ( "SELECT * from TM Where Rut=$rut" ) or die ( mysql_error () );
												
												if ($resultado) {
													
													echo "<table id='t01' class='table table-hover table-bordered'>";
													echo "<thead><tr>";
													echo "<th>Nombre</th>";
													echo "<th>Apellido</th>";
													echo "<th>Rut</th>";
													echo "<th>Mail</th>";
													echo "<th>Celular</th>";
													if ($admin == 1) {
														echo "<th>Editar</th>";
														echo "<th>Eliminar</th>";
													}
													echo "</thead><tbody>";
													while ( $row = mysql_fetch_array ( $resultado ) ) {
														?>
														
															
					<tr>
					<td>
						<div class="form-group">
							<input id="nombre" type="text" class="form-control editable"
								name="Nombre" value="<?php echo $row['Nombre'];?>"
								<?php if($admin==0){ echo "disabled='disabled'";       }?>
								required>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input id="apellido" type="text" class="form-control editable"
								name="Apellido" value="<?php echo $row['Apellido'];?>"
								<?php if($admin==0){ echo "disabled='disabled'";       }?>
								required>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input id="rut" type="number" class="form-control editable"
								name="Rut" value="<?php echo $row['Rut'];?>"
								<?php if($admin==0){ echo "disabled='disabled'";       }?>
								required>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input id="mail" type="text" class="form-control editable"
								name="Mail" value="<?php echo $row['Mail'];?>"
								<?php if($admin==0){ echo "disabled='disabled'";       }?>
								required>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input id="celular" type="number" class="form-control editable"
								name="Celular" value="<?php echo $row['Celular'];?>"
								<?php if($admin==0){ echo "disabled='disabled'";       }?>
								required>
						</div>
					</td>
						<?php
														if ($admin == 1) {
															?>
															
						<td>
						<div>
							<input type="hidden" name="id"
								value="<?php echo $row['idTM']; ?>" /> <input type="submit"
								value="Finalizar edicion" class='btn btn-info btnedit'
								disabled="disabled" />
						</div>
					</td>


					</td>
					<td><input type="submit" value="Eliminar TM"
						class='btn btn-danger btnerase'></td>
				</tr> <?php }?>
					<?php
													}
													?>

					</tbody>
				</table>
					<?php
												}
												?>
			
			</div>
		</body>
	</section>
</center>

<script>
$(".editable").keyup(function(){
$(".btnedit").removeAttr("disabled");

 $(this)
 .parent()
 .parent()
 .parent()
 .addClass("danger");

});
</script>

<script>
$(".btnedit").click(function(){


	
	 jQuery.ajax({
	       method: "POST",
	       url: "querys/updateTM.php",
	       data: {
		     		'nombre':$('#nombre').val(),
		     		'apellido':$('#apellido').val(),
		     		'rut':$('#rut').val(),
		     		'mail':$('#mail').val(),
		     		'celular':$('#celular').val()

	       },
	       
	       success: function(response)
	       {
	    	   $(".btnedit").attr("disabled","disabled");
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
$(".btnerase").click(function(){

	
	var r = confirm("Esta seguro que quiere eliminar a: "+$('#nombre').val()+' '+$('#apellido').val()+"?");
	if (r == true) {

		 jQuery.ajax({
		       method: "POST",
		       url: "querys/eraseTM.php",
		       data: {
			     		
			     		'rut':$('#rut').val()
		          	 },
	           success: function(response)
		 	       {
	        	   location.reload();
		 	       }	    
		 });
	} 
	 

});

</script>

