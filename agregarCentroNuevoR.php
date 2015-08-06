<?php
session_start ();
include "header.php";
include "include/verificacionUsuario.php";
?>
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body background="images/bg.gif">
	<div class="container">
		<h2>Agregar Centro Nuevo</h2>
	<?php //	<form action='querys/insertCentroNuevoR.php' method='POST'> ?>
			<div class="form-group">
			<label for="nombre">Nombre</label> <input type="text"
				class="form-control" id="nombre" placeholder="Agrege nombre"
				required>
		</div>
		<div class="form-group">
			<label>Empresa a la que pertenece</label> <br>
         
          <?php
										include_once "conexionLocal.php";
										
										$query = "SELECT * from Empresa order by Nombre asc ";
										
										$resultado = mysql_query ( $query ) or die ( mysql_error () );
										if ($resultado) {
											echo "<select class='form-control' required name='empresa' id='empresa' >";
											echo "<option value=''> Seleccione Empresa </option>";
											while ( $row = mysql_fetch_assoc ( $resultado ) ) {
												
												echo "<option value='" . $row ['idEmpresa'] . "'>" . $row ['Nombre'] . "</option>";
											}
											echo "</select>";
											
											// echo "</form>";
										}
										?>
    

        </div>
		<div class="form-group">
			<label for="siglas">Siglas</label> <input type="text"
				class="form-control" id="siglas" placeholder="Agrege siglas"
				required>
		</div>
		<div class="form-group">
			<label for="Ecos">Numero de ecos</label> <input type="number"
				class="form-control" id="ecos" placeholder="Agrege numero de ecos"
				required>

		</div>
		<div class="form-group">
			Modificar nombres de Ecos (Eco1,Eco2... por Default) <br> <input
				type="checkbox" id="checkbox">
		</div>

		<div class="row">
			<div id="append" class="col-xs-2" style="display: none"></div>
		</div>
		<div class="form-group">
			<br> <input class='btn btn-info btnedit ' type='submit'
				value='Agregar'>
		</div>

</body>

</html>
<script>

	$( "#ecos" ).bind('keyup', function (event){
		event.preventDefault();

	if	( $( ".Eco1" ).val()!="Eco1"){
	for( var i = 1 ; i<= $( "#ecos" ).val() ; i++){
		$( "#append" ).append( "<input type='Text' class='form-control Eco"+ i +"'  Value='Eco"+ i +"' required>" );
			
	}
	}
	 $( ".Eco1" ).focus() ;
  
	  });

 </script>

<script>
$('#checkbox').on('click', function() {

	$('#append').toggle();
	
});
</script>
