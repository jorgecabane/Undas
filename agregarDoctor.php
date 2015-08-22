<!--  !OOJOOO!REVISAR HEADER! COLAPSA CON <script src="js/bootstrap.min.js"></script> -->
<?php
session_start ();
include "header.php";
include "include/verificacionUsuario.php";

?>
<div class="container">
	<h2>Agregar M&eacute;dicos</h2>
	<h4>(Para Bloques ocupados)</h4>
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
	<div>
		<p id='respuesta'></p>
	</div>
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
			    	   $("#respuesta").text("Se agrego con exito a: " + name+ " " + lastname);
			    	   $('#nombre').val('');
			     		$('#apellido').val('');
			     		   	  
			    	   
			       }

			 }); 
	

});

</script>