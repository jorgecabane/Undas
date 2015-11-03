
<div class="progress" style="display: none">
	<div class="progress-bar progress-bar-striped active"
		role="progressbar" style="width: 100%">
		<span class="sr-only">Cargando...</span>
	</div>
</div>
<div class="row   ">
	<div class="col-xs-2  col-xs-offset-5 text-center hidden-print">
		<label for="start">Seleccione Mes</label> <input
			class="form-control text-center" type="text" id="start" name="from">

	</div>
	<div class="col-sm-2 hidden-print exporta" >
		<button class="btn btn-danger btn-block" onClick="window.print()"
			id="descargar" data-toggle="tooltip" data-placement="left"
			title="Descargar PDF!">
			<span class="glyphicon glyphicon-print"></span>
		</button>
	</div>
</div>

<div id="Liquidaciones" class="row"></div>

<script>
    $(function() {
        var hoy = moment().format('YYYY-MM');
        $('#start').val(hoy);
      
        $("#start").datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            dateFormat: "yy-mm"
        });

          });
</script>
<script>
$("#start").change(function() {

	var mes = $('#start').val();
$("#Liquidaciones").slideDown('slow').load("perfil/liquidaciones.php", {"rut": <?php echo "'$rut'";?>, "mes": mes}, 
		function() {
    $('.progress').slideUp('slow');
});
});
</script>
<script>
$( document ).ready(function() {
var d = new Date(),

n = d.getMonth()+1,

y = d.getFullYear();
var date = y+"-"+n;
$("#Liquidaciones").load("perfil/liquidaciones.php", {"rut": <?php echo "'$rut'";?>, "mes": date}); 
});
</script>