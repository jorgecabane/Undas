<?php
session_start();
require_once dirname(__FILE__) . "/header.php";
$idCentro = $_GET ['idCentro'];
$centro = $_GET ['centro'];
?>
<!-- archivo de carga del calendario personal del TM sin opcion de modificar (solo exportacion) -->
<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-12 well well-sm well-titles'>
            <div class="row">
                <center>
                    <h2>
                        <span class="label label-info label-block">
                            Centro: <b><?php echo $centro; ?></b>
                        </span>
                    </h2>
                </center>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 well well-sm">
            <div class="col-sm-1 hidden-print">
                <button class="btn btn-danger btn-block" onClick="window.print()" id="descargar" data-toggle="tooltip" data-placement="left" title="Descargar PDF!">
                    <span class="glyphicon glyphicon-print"></span>
                </button>
            </div>
            <div id='calendar' ></div>
        </div>
    </div>
</div>



<script>
                    $(document).ready(function() {
                        $('#calendar').fullCalendar({
                            eventSources: {
                                url: "Include/feedEventosCentro.php?idCentro=<?php echo $idCentro; ?>"
                            },
                            header: {
                                left: 'prev,today,next',
                                center: 'title',
                                right: 'agendaDay,agendaWeek,month'
                            },
                            eventRender: function(event, element) {
                                element.find('.fc-title').prepend(event.description + "<br/>");
                            },
                            defaultView: 'month',
                            lazyFetch: true,
                            hiddenDays: [0],
                            allDaySlot: false,
                            minTime: '08:00:00',
                            maxTime: '21:00:00',
                            slotDuration: '00:15:00',
                            contentHeight: 800,
                            displayEventEnd: true,
                            timeFormat: 'H:mm'
                        });//fullCalendar
                    });//ready
</script>