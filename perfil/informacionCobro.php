<center>
	<section class="productList">
		</head>
		<body>
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
												
												$resultado = mysql_query ( "SELECT ValorHora.Valor as Valor, ValorHora.Semana as Semana, Centro.Nombre as Centro, TM.idTM as idTM from TM inner join ValorHora on TM.idTM = ValorHora.Tm_idTM inner join Centro on Centro.idCentro = ValorHora.Centro_idCentro Where TM.Rut='$rut'" ) or die ( mysql_error () );
												
												if ($resultado) {
													?>  <input type="submit" value="Agregar Cobro"
					class='btn btn-info btncobro' />
											<?php
													echo "<table id='append' class='table table-hover table-bordered table-condensed'>";
													echo "<thead><tr>";
													echo "<th>Centro</th>";
													echo "<th>Cobro</th>";
													echo "<th>Semana/Sabado</th>";
													if ($admin == 1) {
														echo "<th>Editar</th>";
														echo "<th>Eliminar</th></tr>";
													}
													echo "</thead><tbody >";
													
													while ( $row = mysql_fetch_array ( $resultado ) ) {
														
														echo "<tr>";
														echo "<td class='centro'>" . $row ['Centro'] . "</td>\n";
														?>
														<td>
					<div class="form-group">
						<input class='form-control editableCobro' type="text" name="cobro" value="<?php echo $row['Valor'];?>" 	<?php if($admin==0){ echo "disabled='disabled'";       }?>	required>

					</div>
				</td>
							<?php
														
														if ($row ['Semana'] == 1) {
															echo "<td class='semana'>Semana</td>";
														} else {
															
															echo "<td class='semana'>Sabado</td>";
														}
														if ($admin == 1) {
															?>
<td><input type="hidden" id="idTM" name="id"
					value="<?php echo $row['idTM']; ?>" /> <input type="submit"
					value="Editar" class='btn btn-info btneditable' disabled="disabled" />

				</td>
				<td><input type="submit" value="Eliminar"
					class='btn btn-danger btndelete' /></td>
<?php
														}
														
														echo "</tr>";
													}
												
													echo "</tbody></table>";
												}
												
												?>
	</div>
		</body>
	</section>
</center>

<script>
$(".editableCobro").keyup(function(){
//$(".btneditable").removeAttr("disabled");
//solo se buscan los elementos de la fila seleccionada
var row = $(this).parent().parent().parent();

row.find(".btneditable").removeAttr("disabled");
row.addClass("danger");
});

$(".btneditable").click(function(){
	//solo se buscan los elementos de la fila seleccionada
	var row = $(this).parent().parent().parent();
	var input = row.find(".editableCobro");
	var centro= row.find(".centro");
	var semana= row.find(".semana");

		jQuery.ajax({
		       method: "POST",
		       url: "querys/updateCobro.php",
		       data: {
			     		'valor': input.val(),
			     		'id': $("#idTM").val(),
			     		'semana': semana.html(),
			     		'centro':  centro.html()

		       },
		       
		       success: function(response)
		       {
		    	   $(".btneditable").attr("disabled","disabled");
		           semana.parent()
			       .removeClass("danger")
			       .addClass("success");
		       }//success
		});//ajax
});//click .btneditable
</script>


<script>
	 
$(".btndelete").click(function(){


	var  centro=
		 $(this)
		 .parent()
		 .parent()
		 .find(".centro")
		 .html();

	var input = 
		 $(this)
	     .parent()
	     .parent()
	     .find(".editableCobro")
	     .val();

	var  semana=
		 $(this)
		 .parent()
		 .parent()
		 .children(".semana")
		 .html();
	 
	var r = confirm("Esta seguro que quiere eliminar la fila: "+ centro +" valor: "+ input +"?");
	if (r == true) {
		jQuery.ajax({
		       method: "POST",
		       url: "querys/eraseCobro.php",
		       data: {			     		
		    	   'valor': input,
		     		'id': $("#idTM").val(),
		     		'semana': semana,
		     		'centro':  centro
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

	$( ".btncobro" ).click(function(){
		var content = "<tr><td><select class='form-control Centro' required name='Centro'>";
		content+= "<option value=''> Seleccione Centro </option>";
		content+= "</select></td>";
		content+= "	<td> <input class='form-control editableCobro' type='text' name='cobro' value='Ingrese Cobro'> </td>";
		content+= "<td><select class='form-control Semana' required name='Semana'>";
		content+= "<option value='1'> Semana </option>";
		content+= "<option value='1'> Sabado </option>";
		content+= "</select></td>";
		content+= "<td><input type='submit' value='Guardar' class='btn btn-info btnguardar' /></td>";
		content+= "<td><input type='submit' value='Cancelar' class='btn btn-danger btncancelar' /></td></tr>";
        $('#append').prepend(content);
  	  });

 </script>













