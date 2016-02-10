<?php
session_start();
require_once dirname(__FILE__)."/header.php";
include_once dirname(__FILE__)."/Include/verificacionUsuario.php";
?>

         <div class="container">
      <h2>Agregar Empresa</h2>
	<div >
<p id='respuesta'>
</p>
</div>
        <div class="form-group">
          <span class="required"><label for="nombre">Nombre</label><font color='red'> *</font></span>
          <input type="text" class="form-control" id="nombre" placeholder="Agrege Nombre de la empresa" required>
        </div>
           <div class="form-group">
          <span class="required"><label for="nombre">Rut</label><font color='red'> *</font></span>
          <input type="text" class="form-control" id="rut" placeholder="Agrege Rut de la empresa con puntos y d&iacute;gito verificador" required>
        </div>
        <div class="form-group">
          <span class="required"><label for="nombre">Correo</label><font color='red'> *</font></span>
          <input type="text" class="form-control" id="mail" placeholder="Agrege mail de la empresa" required>
        </div>
           <div class="form-group">
          <label for="nombre">Giro</label>
          <input type="text" class="form-control" id="giro" placeholder="Agrege Giro de la empresa" required>
        </div>
           <div class="form-group">
          <label for="nombre">Direcci&oacute;n</label>
          <input type="text" class="form-control" id="direccion" placeholder="Agrege Direcci&oacute;n de la empresa" required>
        </div>
           <div class="form-group">
          <label for="nombre">Ciudad</label>
          <input type="text" class="form-control" id="ciudad" placeholder="Agrege Ciudad de la empresa" >
        </div>
           <div class="form-group">
          <label for="nombre">Comuna</label>
          <input type="text" class="form-control" id="comuna" placeholder="Agrege Comuna de la empresa" required>
        </div>
        <div class="form-group">
          <label for="nombre">Raz&oacute;n Social</label>
          <input type="text" class="form-control" id="razon" placeholder="Agrege Raz&oacute;n Social de la empresa" required>
        </div>
             <input type="submit" value="Agregar" id='agregar' class='btn btn-info btnedit'/>
	
    </div>

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
			       url: "querys/insertEmpresaR.php",
			       data: {
				     		'nombre':$('#nombre').val(),
				     		'rut':$('#rut').val(),
				     		'giro':$('#giro').val(),
				     		'direccion':$('#direccion').val(),
				     		'comuna':$('#comuna').val(),
				     		'razon':$('#razon').val(),
		                    'ciudad':$('#ciudad').val(),
		                    'mail':$('#mail').val()
			       },

			       error: function() {
			    	   alert("Error Rut ya existente, intente nuevamente");
			       },

			       success: function(response)
			       {
			    	   $("#respuesta").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+response+'</strong></div>');
			    	    $('#nombre').val('');
			     		$('#rut').val('');
			     		$('#giro').val('');
			     		$('#direccion').val('');
			     		$('#comuna').val('');
		                $('#ciudad').val('');
		                $('#razon').val('');
		                $('#mail').val();
		                setTimeout(function(){location.reload()},2500)

			       }
			 });
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