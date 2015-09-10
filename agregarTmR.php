<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";

?>
	<div class="container">
		<h2>Agregar Personal</h2>

			<div class="form-group">
				<label for="Nombre">Nombre</label> <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Agrege nombre" required>
			</div>
			<div class="form-group">
				<label for="Apellido">Apellido</label> <input type="text" class="form-control"  id="apellido" name="apellido" placeholder="Agrege apellido" required>
			</div>
			<div class="form-group">
				<label for="RUT">RUT</label> <input type="text" class="form-control" id="rut" name="rut" placeholder="Agrege RUT" required>
			</div>
			<div class="form-group">
				<label for="Mail">Mail</label> <input type="text" class="form-control" id="mail" name="mail" placeholder="Agrege Mail" required>
			</div>
			<div class="form-group">
				<label for="Celular">Celular</label> <input type="number" class="form-control" id="celular" name="celular" placeholder="Agrege Celular" required>
			</div>
				<div class="form-group">
				<label for="Celular">Banco</label> <input type="text" class="form-control" id="banco" name="banco" placeholder="Agrege Banco" required>
			</div>
				<div class="form-group">
				<label for="Celular">Cuenta Corriente</label> <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="Agrege Cuenta Corriente" required>
			</div>
			<div class="form-group">
				<label for="contrase�a">Contraseña</label> <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Elegir Contraseña" required>
			</div>
			<div class="form-group">
				<label for="Repetircontrase�a">Repetir Contraseña</label> <input type="password" class="form-control" id="repetircontrasena" name="repetircontrasena" placeholder="Reescribir Contraseña" required>
			</div>
			<br>
			<input type="submit" value="Agregar" id='agregar' class='btn btn-info btnedit'/>
		<div >
<p id='respuesta'>
</p>
</div>
	</div>


</body>
</html>

<script>
$("#agregar").click(function(){

	var name= $('#nombre').val();
	var lastname = $('#apellido').val();
	var contra= $('#contrasena').val();
	var repitecontra= $('#repetircontrasena').val();
		if(contra==repitecontra){


			 jQuery.ajax({
			       method: "POST",
			       url: "querys/insertTmR.php",
			       data: {
				     		'nombre':$('#nombre').val(),
				     		'apellido':$('#apellido').val(),
				     		'rut':$('#rut').val(),
				     		'mail':$('#mail').val(),
				     		'celular':$('#celular').val(),
				     		'banco':$('#banco').val(),
				     		'cuenta':$('#cuenta').val(),
		                    'contrasena':$('#contrasena').val()
			       },

			       error: function() {
			    	   alert("Error Rut ya existente, intente nuevamente");
			       },

			       success: function(response)
			       {
			    	   $("#respuesta").text("Se agrego con exito a: " + name+ " " + lastname);
			    	   $('#nombre').val('');
			     		$('#apellido').val('');
			     		$('#rut').val('');
			     		$('#mail').val('');
			     		$('#celular').val('');
			     		$('#banco').val('');
			     		$('#cuenta').val('');
		               $('#contrasena').val('');
		               $('#repetircontrasena').val('');


			       }

			 });
		}

		else{
	     alert("Las contrase�as no coinciden, intente nuevamente");
		}

});

</script>