<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";

?>
	<div class="container">
		<h2>Agregar Personal</h2>
	<div >
<p id='respuesta'>
</p>
</div>
			<div class="form-group">
				<span class="required"><label for="Nombre">Nombre</label><font color='red'> *</font></span>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Agrege nombre" required>
			</div>
			<div class="form-group">
				<label for="Segundonombre">Segundo Nombre</label> <input type="text" class="form-control" id="segundonombre" name="segundonombre" placeholder="Agrege segundo nombre" required>
			</div>
			<div class="form-group">
				<span class="required"><label for="Apellido">Apellido</label><font color='red'> *</font></span>
				<input type="text" class="form-control"  id="apellido" name="apellido" placeholder="Agrege apellido" required>
			</div>
			<div class="form-group">
				<label for="Segundoapellido">Segundo Apellido</label> <input type="text" class="form-control"  id="segundoapellido" name="Segundoapellido" placeholder="Agrege segundo apellido" required>
			</div>
			<div class="form-group">
				<span class="required"><label for="RUT">RUT</label> <font color='red'> *</font></span>
				<input type="text" class="form-control" id="rut" name="rut" placeholder="Agrege Rut con digito verificador y puntos" required>
			</div>
			<div class="form-group">
				<span class="required"><label for="Mail">Mail</label><font color='red'> *</font></span>
				<input type="text" class="form-control" id="mail" name="mail" placeholder="Agrege Mail" required>
			</div>
			<div class="form-group">
				<label for="Celular">Celular</label> <input type="text" class="form-control" id="celular" name="celular" placeholder="Agrege Celular" required>
			</div>
				<div class="form-group">
				<label for="Banco">Banco</label> <input type="text" class="form-control" id="banco" name="banco" placeholder="Agrege Banco" required>
			</div>
				<div class="form-group">
				<label for="Cuentacorriente">Cuenta Corriente</label> <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="Agrege Cuenta Corriente" required>
			</div>
			<div class="form-group">
				<label for="Comentario">Comentario</label> <textarea rows="4" cols="30" type="text" class="form-control" id="comentario" name="comentario" placeholder="Escribir comentario" required></textarea>
			</div>
			<br>
			<input type="submit" value="Agregar" id='agregar' class='btn btn-info btnedit'/>
	
	</div>


</body>
</html>

<script>
$("#agregar").click(function(){

	var empty = 0;
	
	  $(".required").each(function() {
	        var objeto = $(this).parent().find('.form-control');
	     if(objeto.val() == ""){
	    	 objeto.parent().addClass('has-error');
           objeto.effect( "shake" );
           empty++;
	     }
		    
	    });
	    
	    if ( empty == 0)
	    {
	
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
		                    'comentario':$('#comentario').val(),
		                    'segundonombre':$('#segundonombre').val(),
		                    'segundoapellido':$('#segundoapellido').val()
			       },

			       error: function() {
			    	   alert("Error Rut ya existente, intente nuevamente");
			       },

			       success: function(response)
			       {
			    	    $("#respuesta").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+response+'</strong><br></div>');
				    	$('#nombre').val('');
			     		$('#apellido').val('');
			     		$('#rut').val('');
			     		$('#mail').val('');
			     		$('#celular').val('');
			     		$('#banco').val('');
			     		$('#cuenta').val('');
		                $('#contrasena').val('');
		                $('#repetircontrasena').val('');
		                $('#comentario').val('');
		                $('#segundonombre').val('');
		                $('#segundoapellido').val('');
		                $(".form-control").parent().removeClass('has-error');
			       }

			 });//ajax
	    }

});

</script>
<script>
  $(".required").each(function() {
        var objeto = $(this);
		objeto.attr("data-content", "Campo obligatorio");
     
    })
            .popover({
        html: true,
        animation: true,
        trigger: 'hover'
    });//popover
    </script>