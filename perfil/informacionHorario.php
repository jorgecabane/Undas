<?php
if(isset($_SESSION)){
	//si hay sesion iniciada
	//var_dump($_POST);

}else{
	echo '<div class="alert alert-danger">No se ha iniciado sesion.</div>';
}

?>
<!-- archivo de carga del calendario personal del TM sin opcion de modificar (solo exportacion) -->


<div id='calendar' class='col-sm-12'></div>


<script>
$(document).ready(function(){
	$('#calendar').fullCalendar({
		eventSources: {
			url: "Include/feedEventosTM.php?Rut=<?php echo $_POST['Rut'];?>"
				},
		header : {
			left : 'prev,next, today',
			center : 'title',
			right : 'agendaDay,agendaWeek,month'
		},
		eventRender: function(event, element) {
            element.find('.fc-title').prepend(event.description + "<br/>");
        },
		defaultView : 'agendaWeek',
		lazyFetch: true,
		hiddenDays : [ 0 ],
		allDaySlot: false,
		businessHours:{
		    start: '8:00', // a start time (10am in this example)
		    end: '22:00', // an end time (6pm in this example)

		    dow: [ 1, 2, 3, 4, 5, 6 ]
		    // days of week. an array of zero-based day of week integers (0=Sunday)
		    // (Monday-Thursday in this example)
		}
	});//fullCalendar



	$('#myTabs').tabs({
	    activate: function(event, ui) {
	        $('#calendar').fullCalendar('render');
	    }
	});
});//ready
</script>