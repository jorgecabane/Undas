<?php
session_start ();
include "header.php";
include_once "include/verificacionUsuario.php";

?>
<div class="container-fluid">
	<div class="row">
		<h2>
			<center>Perfiles Tecnologos Medicos</center>
		</h2>
	</div>


	<div class="row">

 <?php
	// si es admin ve esto
	if ($admin == 1) {
		?>
		<div class="col-sm-2 well">

			<h4>Busque por TM</h4>

			<input id="search" class="form-control" type="text" name="valor"
				placeholder="Filtre por TM" />


			<div id="listado" style="margin-top: 60px;">
				<!-- aqui iria una tabla de todos los tms en caso de lata de buscar -->
				<?php
		if ($admin == 1) {
			include "querys/todosTmListado.php";
		}
		?>
				
				
			</div>

		</div>
		<?php
	}
	?>

<?php
// si no admin ve esto
if ($admin == 0) {
	echo '<div class="col-sm-12 well" id="perfil">';
} else {
	echo '<div class="col-sm-10 well" id="perfil">';
}
?>
		
			<!-- aqui va perfil -->
	</div>
</div>









</div>

<?php
// si es admin ve esto
if ($admin == 1) {
	echo '<script>
 			$( document ).ready(function() {
			$("#call").focus(); 
			});
		 </script>';
} elseif ($admin == 0) {
	
	$sessionrut = $_SESSION ['idusuario'];
	
	$query = "SELECT Rut FROM TM WHERE idTM=$sessionrut";
	
	$res = mysql_query ( $query ) or die ( mysql_error () );
	
	$row = mysql_fetch_assoc ( $res );
	$Rut = $row ["Rut"];
	
	echo "<script>
		$( '#perfil' ).load( 'perfil/perfilGeneral.php' , {'Rut': $Rut} ).slideDown('1000');
	  </script>";
}
?>

<script src="include/filtro.js"></script>

<script>
$( ".fc-event" ).click(function() {
	$( "#perfil" ).load( "perfil/perfilGeneral.php" , {"Rut":$(this).attr('Rut')} ).slideDown('1000');
	
});
</script>