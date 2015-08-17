<?php
session_start();
include "header.php";
include "include/verificacionUsuario.php";
?>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body background="images/bg.gif">
         <div class="container">
      <h2>Agregar Empresa</h2>
      
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Agrege Nombre de la empresa" required>
        </div>          
           <div class="form-group">
          <label for="nombre">Rut</label>
          <input type="text" class="form-control" id="rut" placeholder="Agrege Rut de la empresa" required>
        </div>         
           <div class="form-group">
          <label for="nombre">Giro</label>
          <input type="text" class="form-control" id="giro" placeholder="Agrege Giro de la empresa" required>
        </div>          
           <div class="form-group">
          <label for="nombre">Direccion</label>
          <input type="text" class="form-control" id="direccion" placeholder="Agrege Direccion de la empresa" required>
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
          <label for="nombre">Razon Social</label>
          <input type="text" class="form-control" id="razon" placeholder="Agrege Razon Social de la empresa" required>
        </div>              
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
		                    'ciudad':$('#ciudad').val()
			       },
			       
			       error: function() {
			    	   alert("Error Rut ya existente, intente nuevamente");
			       },
			       
			       success: function(response)
			       {
			    	   $("#respuesta").text("Se agrego con exito a: " + name);
			    	   $('#nombre').val('');
			     		$('#rut').val('');
			     		$('#giro').val('');
			     		$('#direccion').val('');
			     		$('#comuna').val('');
		               $('#ciudad').val('');
		               $('#razon').val('');
		                
			       }
			 }); 
		
});
</script>