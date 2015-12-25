<?php
session_start();
require_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
?>
<div class="container">
    <h2>Editar Clave</h2>
    <div>
		<p id='respuesta'></p>
	</div>
        <div class="form-group">
            <label for="Nombre">Ingrese Clave Antigua</label>
            <input id='claveantigua' type="password" class="form-control" name="claveantigua"  placeholder="Ingrese clave antigua" required>
        </div>
        <div class="form-group">
            <label for="contrase�a">Nueva Clave</label>
            <input id='clavenueva' type="password"  class="form-control" name="clavenueva" placeholder="Ingrese nueva clave" required>
        </div>
        <div class="form-group">
            <label for="Repetircontrase�a">Repetir Clave Nueva</label>
            <input id='repetirclave' type="password"  class="form-control" name="repetirclave" placeholder="Reescribir clave nueva" required>
        </div>
       
        <br>
        <button id='cambiar' type="submit" class="btn btn-info">Cambiar</button>
    
</div>

<script>
$("#cambiar").click(function(){

	
				 jQuery.ajax({
			       method: "POST",
			       url: "querys/updateClaveEmpresa.php",
			       data: {
				     		'claveantigua':$('#claveantigua').val(),
				     		'clavenueva':$('#clavenueva').val(),
				     		'repetirclave':$('#repetirclave').val(),
				     		'id':"<?php echo $_SESSION['idusuario']; ?>",
				  
			       },

			       error: function() {
			    	   alert("Error Rut ya existente, intente nuevamente");
			       },

			       success: function(response)
			       {
			    	   $("#respuesta").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+response+'</strong></div>');
			    	   $('#claveantigua').val('');
			     	   $('#clavenueva').val('');
			     	   $('#repetirclave').val('');


			       }

			 });


});

</script>

