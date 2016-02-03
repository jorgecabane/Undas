<?php
include_once "../querys/getEmpresa.php";
?>
<div class="row">
	<div class="col-xs-4  col-xs-offset-4 text-center hidden-print">
		<label>Seleccione Empresa</label> <select
			class="form-control text-center" id="empresa">
			
	<?php
	$empresas = getEmpresa ();
	foreach ( $empresas as $empresa ) {
		if($empresa['Nombre']!='Sin Turno'){
		?>
        <option value="<?php echo $empresa['idEmpresa'];?>"><?php echo $empresa['Nombre'];?></option>
    <?php
	}}
	
	?>
		

	</select>
	</div>
</div>

<div id="prestaciones" class="row"></div>


<script>
$("#empresa").change(function() {
var empresa = $('#empresa').val();
$("#prestaciones").slideDown('slow').load("perfil/prestaciones.php", {"rut": <?php echo "'$rut'";?>, "empresa": empresa});
});
</script>
<script>
$( document ).ready(function() {
var empresa = $('#empresa option:eq(0)').val() ; 	
$("#prestaciones").slideDown('slow').load("perfil/prestaciones.php", {"rut": <?php echo "'$rut'";?>, "empresa": empresa}); 
});
</script>