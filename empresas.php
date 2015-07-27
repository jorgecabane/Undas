<?php
session_start ();

include "header.php";
include "include/verificacionUsuario.php";

?>

<div class="container-fluid">
	<div class="row" id="header">
		<!--  aqui tiene que ir el include del header  -->


	</div>
	<div class="row">
		<h2>
			<center>Perfiles Empresas</center>
		</h2>
	</div>


	<div class="row">
<?php 
// si es admin ve esto
if ($admin == 1) {
?>
	<div class="col-sm-12 well  " id="perfil">
<?php
} 
else {
?>
	<div class="col-sm-10 well  " id="perfil">
<?php	
} 
// si no admin ve esto
?>
<!-- aqui va perfil -->
</div>
</div>
</div>
<?php 
// si es admin ve esto
if ($admin == 1) {	
echo '
<script>
$( "#perfil" ).load( "perfil/empresaGeneral.php"  );
</script>';
}
elseif($admin==0){
echo '				
<script>
$( "#perfil" ).load( "perfil/empresaGeneral.php");
</script>';
		}			
?>


