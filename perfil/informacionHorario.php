<!-- archivo de carga del calendario personal del TM sin opcion de modificar (solo exportacion) -->


<div id='calendarTM' class='col-sm-12'></div>

<script>
$(document).ready(function(){
	$('#calendarTM').fullCalendar({
		eventSources: {
			url: "Include/feedEventosCentro.php?idTM=1"
				},
		header : {
			left : 'prev,next, today',
			center : 'title',
			right : 'agendaDay,agendaWeek,month'
		},
		defaultView : 'agendaWeek',
		lazyFetch: true,
		hiddenDays : [ 0 ],
		allDaySlot: false
				
		});//fullCalendar
	
});



</script>