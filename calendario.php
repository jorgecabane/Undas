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

.fc-event {
	margin-top: 3px;
	marin-bottom: 3px
}
</style>
</head>
<body>
 ///////////////////////////////////////////////////ELiminable si se incluye///////////////////////////////////////////////// -->
<link href='calendario/fullcalendar.css' rel='stylesheet' />
<link href='calendario/fullcalendar.print.css' rel='stylesheet'
	media='print' />
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-4 col-md-offset-4 well well-sm'><?php echo "<center><h4>Centro: <b>$centro</b></h4></center>";?></div>
	</div>
	<div class='row'>
		<div id='external-events' class='col-md-2 well well-sm'>
			<h4>Listado de TM's</h4>
			<select name='ecos' id='ecos' class='form-control'
				style='width: 100%;'>
<?php 



?><!-- Generacion de listado de ecos como opcion -->
				<option value='eco1' event-color='#2b95ce'>Eco1</option>
				<option value='eco2' event-color='#5ed639'>Eco2</option>
			</select>
			<hr class='hr-sm'>
			<input type='text' class='form-control'
				placeholder='Filtrar por Nombre'>
			<hr class='hr-sm'>
<?php 




?><!-- Generacion de listado de TMs -->			
			<div class='fc-event label label-info label-block'
				event-color='#2b95ce'>Juan Perez</div>
			<div class='fc-event label label-info label-block'
				event-color='#2b95ce'>Eduardo Rojas</div>
			<div class='fc-event label label-info label-block'
				event-color='#2b95ce'>Jorge Cabane</div>
			<div class='fc-event label label-primary label-block'
				event-color='#2b95ce'>Cesar Gonzalez</div>
			<div class='fc-event label label-primary label-block'
				event-color='#2b95ce'>Mihail Pozarski</div>
			<p>
				<input type='checkbox' id='drop-remove' /> <label for='drop-remove'>eliminar
					despues del uso</label>
			</p>
			<hr class="hr-sm">
			
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
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {

		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#ecos').change(function(){
				color = $('#ecos option:selected').attr('event-color');
				$('#external-events .fc-event').each(function(){
					$(this).attr('event-color',color); // se asigna el color de la eco correspondiente a cada elemento
					$(this).data('event', {
						title : $.trim($(this).text()), // use the element's text as the event title
						stick : true,	// maintain when user navigates (see docs on the renderEvent method)
						color : color, //cambia el color al color asignado
						editable : true
					});
					});// each
			});
		
		$('#external-events .fc-event').each(function() {
			var colorEvento = $(this).attr('event-color');
			
			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title : $.trim($(this).text()), // use the element's text as the event title
				stick : true,	// maintain when user navigates (see docs on the renderEvent method)
				color : colorEvento, //cambia el color al color asignado
				editable : true
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex : 999,
				revert : true, // will cause the event to go back to its
				revertDuration : 0
			//  original position after the drag
			});

		});

		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header : {
				left : 'prev,next today',
				center : 'title',
				right : 'agendaDay,agendaWeek,month'
			},
			defaultView : 'agendaWeek',
			editable : true,
			droppable : true, // this allows things to be dropped onto the calendar
			drop : function(event) {
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			},
			hiddenDays : [ 0 ]
		});

	});
</script>
<script>
	////////////////////////////// formato de evento //////////////////////////////////
	evento = {
		"title" : "Evento prueba",
		"start" : "2015-07-22T10:14:28+00:00",
		"end" : "2015-07-22T11:14:28+00:00",
		"id" : "7",
		"userID" : "1",
		"color" : "#ff0000",
		"className" : "ticketSrc_1",
		"custom" : "test text here",
		"eventDurationEditable" : true
	};

	/* $('.btn').click(function() {
		$.ajax(
				)
		//$('#calendar').fullCalendar('renderEvent', evento);
	}); */
</script>
</html>
