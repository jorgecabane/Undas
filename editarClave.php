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
           <span class="required"><label for="Nombre">Ingrese Clave Antigua</label><font color='red'> *</font></span>
            <input id='claveantigua' type="password" class="form-control" name="claveantigua"  placeholder="Ingrese clave antigua" required>
        </div>
        <div class="form-group">
             <span class="required"><label for="contrase�a">Nueva Clave</label><font color='red'> *</font></span>
            <input id='clavenueva' type="password"  class="form-control" name="clavenueva" placeholder="Ingrese nueva clave" required>
        </div>
        <div class="form-group">
            <span class="required"><label for="Repetircontrase�a">Repetir Clave Nueva</label><font color='red'> *</font></span>
            <input id='repetirclave' type="password"  class="form-control" name="repetirclave" placeholder="Reescribir clave nueva" required>
        </div>
       
        <br>
        <button id='cambiar' type="submit" class="btn btn-info">Cambiar</button>
    
</div>

<script>
$("#cambiar").click(function(){

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
			       url: "querys/updateClaveTm.php",
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
			     	   $(".form-control").parent().removeClass('has-error');
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