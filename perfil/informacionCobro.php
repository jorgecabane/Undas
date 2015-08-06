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
			
			$resultado = mysql_query ( "SELECT ValorHora.Valor as Valor, ValorHora.Semana as Semana, Centro.Nombre as Centro, TM.idTM as idTM from TM inner join ValorHora on TM.idTM = ValorHora.Tm_idTM inner join Centro on Centro.idCentro = ValorHora.Centro_idCentro Where TM.Rut=$rut" ) or die ( mysql_error () );
			
			if ($resultado) {
				
				echo "<table id='t01'class='table table-hover table-bordered table-condensed'>";
				echo "<thead><tr>";
				echo "<th>Centro</th>";
				echo "<th>Cobro</th>";
				echo "<th>Semana/Sabado</th>";
				if ($admin == 1) {
					echo "<th>Editar</th>";
					echo "<th>Eliminar</th></tr>";
				}
				echo "</thead><tbody>";
				while ( $row = mysql_fetch_array ( $resultado ) ) {
					
					echo "<tr>";
					echo "<td class='centro'>" . $row ['Centro'] . "</td>\n";
					?>
														<td>
					<div class="form-group">
						<input class='editableCobro' type="text" class="form-control"
							name="Mail" value="<?php echo $row['Valor'];?>"
							<?php if($admin==0){ echo "disabled='disabled'";       }?>
							required>

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

$(this)
.parent()
.parent()
.parent()
.children()
.children(".btneditable")
.removeAttr("disabled");


 $(this)
 .parent()
 .parent()
 .parent()
 .addClass("danger");


var input = 
	 $(this)
	 .parent()
	 .parent()
	 .parent()
	 .children()
	 .children()
	 .children(".editableCobro");

var  centro=
	 $(this)
	 .parent()
	 .parent()
	 .parent()
	 .children(".centro");

var  semana=
	 $(this)
	 .parent()
	 .parent()
	 .parent()
	 .children(".semana");

$(".btneditable").click(function(){

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
	       }

	 });


});


 
});
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














