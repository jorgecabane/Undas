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
		allDaySlot: false
				
		});//fullCalendar
});
</script>