<?php
session_start ();
require_once "header.php";
include_once "include/verificacionUsuario.php";
$idCentro = $_GET ['idCentro'];
$centro = $_GET ['centro'];

?>
<!-- /////////////////////////////////////////////////////////////Eliminable si se incluye//////////////////////////////////
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<style>
body {
	margin-left: 8px;
	margin-top: 8px;
	font-size: 14px;
	font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}


</head>
<body>
 ///////////////////////////////////////////////////ELiminable si se incluye///////////////////////////////////////////////// -->
<link href='calendario/fullcalendar.css' rel='stylesheet' />
<link href='calendario/fullcalendar.print.css' rel='stylesheet'
	media='print' />
<style>
.fc-event {
	margin-top: 3px;
	marin-bottom: 3px
}
</style>
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-4 col-md-offset-4 well well-sm well-titles'>
			<center>
				<h4>
					Centro: <b><?php echo $centro;?></b>
				</h4>
			</center>
		</div>
	</div>
	<div class='row'>
		<div id='external-events' class='col-md-2 well well-sm'>
			<h4>Listado de TM's</h4>
			<select name='ecos' id='ecos' class='form-control'
				style='width: 100%;'>
<?php
$ecos = getEcos ( $idCentro );
foreach ( $ecos as $eco ) {
	echo "<option value='" . $eco ['idEcos'] . "' event-color='" . $eco ['color'] . "'>" . $eco ['Nombre'] . "</option>";
}

?>
				<!-- Generacion de listado de ecos como opcion -->
				<!-- <option value='eco1' event-color='#2b95ce'>Eco1</option>
				<option value='eco2' event-color='#5ed639'>Eco2</option> -->
			</select>
			<hr class='hr-sm'>
			<input type='text' id='search' class='form-control'
				placeholder='Filtrar por Nombre'>
			<hr class='hr-sm'>
		<?php
		$tms = getTM ();
		foreach ( $tms as $tm ) {
			echo "<div class='fc-event label label-block' event-color='#2b95ce'>" . $tm ['Nombre'] . " " . $tm ['Apellido'] . "</div>";
		} // <div class='fc-event label label-info label-block' event-color='#2b95ce'>Juan Perez</div>
		?>
			<!-- Generacion de listado de TMs -->

			<hr class="hr-sm">
			<Ma href='#' class='btn btn-warning btn-block'>Ejecutar</a>
		<?php
		// para los filtros de Eco
		?>
		</div>
		<div class='col-md-10'>
			<!-- calendario -->
			<div id='calendar' class='well'></div>
			<!-- calendario -->
		</div>
		<div style='clear: both'></div>
	</div>
	<!-- row -->
</div>
<!-- container-fluid -->
</body>
<script src='calendario/lib/moment.min.js'></script>
<script src='calendario/lib/jquery.min.js'></script>
<script src='calendario/lib/jquery-ui.custom.min.js'></script>
<script src='calendario/fullcalendar.min.js'></script>
<script src='calendario/lang/es.js'></script>

<script>
	$(document).ready(function() {

		/* initialize the external events
		-----------------------------------------------------------------*/
		/*cuando se cambia la eco se "instancia" nuevamente los ecos pero con el color de la eco
		*/
		$('#ecos').change(function(){
				color = $('#ecos option:selected').attr('event-color');
				eco = $('#ecos option:selected').text();
				idEco = $('#ecos').val();
				$('#external-events .fc-event').each(function(){
					$(this).css('background', color).css('border',color);
					$(this).attr('event-color',color); // se asigna el color de la eco correspondiente a cada elemento
					$(this).data('event', {
						title : eco, // use the element's text as the event title
						description : $.trim($(this).text()),
						stick : true,	// maintain when user navigates (see docs on the renderEvent method)
						color : color, //cambia el color al color asignado
						editable : true,
						idEco: idEco
					});
					});// each
			});
		
		$('#external-events .fc-event').each(function() {
			color = $(this).attr('event-color');
			eco = $('#ecos option:selected').text();
			idEco = $('#ecos').val();
			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
						title : eco, // use the element's text as the event title
						description : $.trim($(this).text()),
						stick : true,	// maintain when user navigates (see docs on the renderEvent method)
						color : color, //cambia el color al color asignado
						editable : true,
						idEco: idEco
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex : 999,
				revert : true, // will cause the event to go back to its original position after the drag
				revertDuration : 0
			});

		});

		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			eventSources: [{
				url: "Include/feedEventosCentro.php?idCentro=<?php echo $idCentro;?>"	
						}],//eventSources
				eventRender: function(event, element) { 
		            element.find('.fc-title').append("<br/>" + event.description);
		        },
		        eventDrop: function(event, element) {
			         //verificacion en la base de datos (si hay algun evento a la misma hora en el mismo lugar)
			         alert(event.idEco+' '+event.start.format());
			         $.ajax({
			     		url: 'include/verificaEco.php',
			     		async: true,
			     		data: {"idEco":event.idEco,"start":event.start.format()},
			     		method: 'POST'
			     		});//ajax
			         //se hacen las verificaciones del evento
					 //se actualiza en la bbdd el elemento o se guarda si no existe
					 
			    },
				header : {
				left : 'prev,next today',
				center : 'title',
				right : 'agendaDay,agendaWeek,month'
			},
			
			defaultView : 'agendaWeek',
			lazyFetch: true,
			editable : true,
			selectable: true,
			droppable : true, // this allows things to be dropped onto the calendar
			drop : function(event) {
				//deberiamos guardarlos en la bbdd
				
			},
			hiddenDays : [ 0 ],
			allDaySlot: false			
		});

	});
</script>
<script>

 	$('.btn').click(function() {
 		
	});
</script>
<script src="include/filtro.js"></script>
</html>
