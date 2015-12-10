<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
?>
<div class="container">
	<h2>Agregar M&eacute;dicos</h2>
	<h4>(Para Bloques ocupados)</h4>
	<div>
		<p id='respuesta'></p>
	</div>
	<div class="form-group">
		<label for="Nombre">Nombre</label> <input type="text"
			class="form-control" id="nombre" name="nombre"
			placeholder="Agrege nombre" required>
	</div>
	<div class="form-group">
		<label for="Apellido">Apellido</label> <input type="text"
			class="form-control" id="apellido" name="apellido"
			placeholder="Agrege apellido" required>
	</div>
	<br> <input type="submit" value="Agregar" id='agregar'
		class='btn btn-info btnedit' />
	
</div>


</body>
</html>

<script>
$("#agregar").click(function(){

	var name= $('#nombre').val();
	var lastname = $('#apellido').val();
				 jQuery.ajax({
			       method: "POST",
			       url: "querys/insertDoctor.php",
			       data: {
				     		'nombre':$('#nombre').val(),
				     		'apellido':$('#apellido').val()
			       },

			       error: function() {
			    	   alert("Error Rut ya existente, intente nuevamente");
			       },

			       success: function(response)
			       {
			    	   $("#respuesta").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+response+'</strong></div>');
			    	   $('#nombre').val('');
			     	   $('#apellido').val('');


			       }

			 });


});

</script>