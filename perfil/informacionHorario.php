<!-- archivo de carga del calendario personal del TM sin opcion de modificar (solo exportacion) -->


<div id='calendar' class='col-sm-12'></div>


<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            eventSources: {
                url: "Include/feedEventosTM.php?Rut=<?php echo $rut; ?>"
            },
            header: {
                left: 'prev,today,next',
                center: 'title',
                right: 'agendaDay,agendaWeek,month'
            },
            eventRender: function(event, element) {
                element.find('.fc-title').prepend(event.description + "<br/>");
            },
            defaultView: 'agendaWeek',
            lazyFetch: true,
            hiddenDays: [0],
            allDaySlot: false,
            minTime: '08:00:00',
            maxTime: '21:00:00',
            slotDuration: '00:15:00',
            contentHeight: 700,
            displayEventEnd: true
        });//fullCalendar
    });//ready
</script>