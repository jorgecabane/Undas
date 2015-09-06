<?php
session_start();
require_once "header.php";
include_once "include/verificacionUsuario.php";
$idCentro = $_GET ['idCentro'];
$centro = $_GET ['centro'];
?>
<script type="text/javascript" src="include/excellentexport.min.js"></script>
<style>
    #external-events .fc-event {
        margin-top: 3px;
        margin-bottom: 3px;
        cursor: pointer;
    }

    .alert {
        margin-bottom: 0px;
    }
    /* Popover */
    .popover {
        border: 2px dotted #6EBFEE;
    }

    /* Popover Header */
    .popover-title {
        background-color: #6EBFEE;
        color: #FFFFFF;
        font-size: 16px;
        text-align:center;
        width: 200px;
    }

    /* Popover Body */
    .popover-content {
        background-color: white;
        color: #6EBFEE;
        padding: 1px;
        text-align: justify;
    }

    /* Popover Arrow */
    .arrow {
        border-right-color: #6EBFEE !important;
    }
</style>

<div class='container-fluid'>
    <div class='row'>
        <div class="col-md-1 col-md-offset-3 well well-sm well-titles" >
            <div id="deleteArea" class="alert alert-danger" style="padding-bottom: 6px; padding-top: 6px;" data-toggle="tooltip" data-placement="left" title="Arraste evento para eliminar">
                <b>Eliminar</b>
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </div>
        </div>
        <div class='col-md-4 well well-sm well-titles'>
            <center>
                <h2>
                    <span class="label label-info label-block">
                        Centro: <b><?php echo $centro; ?></b>
                        <a download="horario.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Horario');">Export to Excel</a>
                    </span>
                </h2>
            </center>
        </div>
        <!-- Single button -->
        <div class="col-md-1 well well-sm well-titles">
            <center>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Repetir
                        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Repetir semana</a></li>
                        <li><a href="#">Repetir mes anterior</a></li>
                    </ul>
                </div>
            </center>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-2 hidden-sm hidden-xs well well-sm'>
            <h4>Seleccionar Eco</h4>
            <select name='ecos' id='ecos' class='form-control'
                    style='width: 100%;'>
                        <?php
                        $ecos = getEcos($idCentro);
                        foreach ($ecos as $eco) {
                            echo "<option value='" . $eco ['idEcos'] . "' event-color='" . $eco ['color'] . "'>" . $eco ['Nombre'] . "</option>";
                        }
                        ?>
                <!-- Generacion de listado de ecos como opcion -->
                <!-- <option value='eco1' event-color='#2b95ce'>Eco1</option>
                <option value='eco2' event-color='#5ed639'>Eco2</option> -->
            </select>
            <hr class='hr-sm'>
            <h4>Listado TMs</h4>
            <input type='text' id='search' class='form-control'
                   placeholder='Filtrar por Nombre'>
            <hr class='hr-sm'>
            <div  id='external-events'>
                <?php
                $tms = getTM();
                foreach ($tms as $tm) {
                    echo "<div class='label fc-event' event-color='#6ebfee' idTM='" . $tm['idTM'] . "'>" . $tm ['Nombre'] . " " . $tm ['Apellido'] . "</div>";
                } // <div class='fc-event label label-info label-block' event-color='#2b95ce'>Juan Perez</div>
                ?>
                <!-- Generacion de listado de TMs -->
            </div>
            <hr class="hr-sm">
            <!-- <Ma href='#' class='btn btn-warning btn-block'>Ejecutar</a> -->
        </div>
        <div class='col-md-10 well well-sm'>
            <div class="progress" style="display:none">
                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
            <!-- calendario -->
            <div id='calendar'></div>
            <!-- calendario -->
        </div>
        <div style='clear: both'></div>
    </div>
    <!-- row -->
</div>

<!-- container-fluid -->
</body>
<?php include_once dirname(__FILE__) . '/Include/modalVerificaciones.php'; //modal para los mensajes de verificacion?>

<script>
                            $(document).ready(function() {

                                /* initialize the external events
                                 -----------------------------------------------------------------*/
                                /*cuando se cambia la eco se "instancia" nuevamente los ecos pero con el color de la eco
                                 */
                                $('#ecos').change(function() {
                                    color = $('#ecos option:selected').attr('event-color');
                                    eco = $('#ecos option:selected').text();
                                    idEco = $('#ecos').val();

                                    $('#external-events .fc-event').each(function() {
                                        $(this).css('background', color).css('border', color);
                                        $(this).attr('event-color', color); // se asigna el color de la eco correspondiente a cada elemento
                                        idTM = $(this).attr('idTM');
                                        $(this).data('event', {
                                            title: eco, // use the element's text as the event title
                                            description: $.trim($(this).text()),
                                            //stick: true, // maintain when user navigates (see docs on the renderEvent method)
                                            color: color, //cambia el color al color asignado
                                            editable: true,
                                            idEco: idEco,
                                            idTM: idTM,
                                            fromBD: 0,
                                            saved: 0
                                        });
                                    });// each
                                });

                                $('#external-events .fc-event').each(function() {
                                    color = $(this).attr('event-color');
                                    eco = $('#ecos option:selected').text();
                                    idEco = $('#ecos').val();
                                    idTM = $(this).attr('idTM');
                                    // store data so the calendar knows to render an event upon drop
                                    $(this).data('event', {
                                        title: eco, // use the element's text as the event title
                                        description: $.trim($(this).text()),
                                        //stick: true, // maintain when user navigates (see docs on the renderEvent method)
                                        color: color, //cambia el color al color asignado
                                        editable: true,
                                        idEco: idEco,
                                        idTM: idTM,
                                        fromBD: 0,
                                        saved: 0
                                    });

                                    // make the event draggable using jQuery UI
                                    $(this).draggable({
                                        zIndex: 999,
                                        revert: true, // will cause the event to go back to its original position after the drag
                                        revertDuration: 0
                                    });

                                });
                            });
</script>
<script>
    /* initialize the calendar
     -----------------------------------------------------------------*/
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            eventSources: [{
                    url: "Include/feedEventosCentro.php?idCentro=<?php echo $idCentro; ?>"
                }], //eventSources
            eventRender: function(event, element) {
                //se agrega la descripcion al evento
                element.find('.fc-title').append("<br/>" + event.description);
                //al hacer click se puede ver el detalle
                element.popover({
                    title: 'Detalles del Evento',
                    content: '<div><b>Eco: </b>' + event.title + '<br>\n\
                             <b>TM: </b>' + event.description + '<br>\n\
                             <b>Inicia: </b>' + event.start.format() + '<br>\n\
                             <b>Termina: </b>' + event.end.format() + '<br>\n\
                             </div>',
                    html: true,
                    animation: true
                });//popover
            },
            eventAfterRender: saveBD,
            eventResize: update,
            eventDrop: update,
            eventDragStop: deleteEvent,
            header: {
                left: 'prev,today,next myCustomButton',
                center: 'title',
                right: 'agendaDay,agendaWeek,month'
            },
            businessHours: {
                start: '8:00', // a start time (10am in this example)
                end: '21:00', // an end time (6pm in this example)

                dow: [1, 2, 3, 4, 5, 6]
                        // days of week. an array of zero-based day of week integers (0=Sunday)
                        // (Monday-Thursday in this example)
            },
            slotEventOverlap: false,
            forceEventDuration: true,
            slotDuration: '00:15:00',
            defaultTimedEventDuration: '03:00:00',
            minTime: '08:00:00',
            maxTime: '21:00:00',
            defaultView: 'agendaWeek',
            lazyFetch: true,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            hiddenDays: [0],
            contentHeight: 600,
            allDaySlot: false
        });

    });//document.ready
</script>
<script>
    var saveBD = function(event, element) {

        idTM = event.idTM;
        idEco = event.idEco;
        start = event.start.format();
        end = event.end.format();

        if (event.fromBD === 0) {
            if (event.saved === 0) {
                //si el evento no se encuentra guardado en la bbdd
                //armado de JSON para envio de datos
                $.ajax({
                    url: 'include/insertarEvento.php',
                    async: true,
                    data: {"idTM": idTM, "idEco": idEco, "start": start, "end": end},
                    method: 'POST',
                    beforeSend: function() {
                        $('.progress').slideDown();
                    },
                    success: function(output) {
                        if (output !== '0') {
                            //console.log(event.saved);
                            event.saved = 1;
                            event.id = output;
                            $('#calendar').fullCalendar('updateEvent', event);
                            $('.progress').slideUp();
                            //console.log(output);

                        }
                    }//success
                });//ajax
            }//si ya se guardo previamente
        }// si el evento viene de la bbdd

    };//function saveBD

</script><!-- SAVEBD -->
<script>
    var update = function(event, element) {
        idEvento = event.id;
        //$('#calendar').fullCalendar('updateEvent', event);

        end = event.end.format();
        start = event.start.format();
        //alert(idEvento);

        $.ajax({
            url: 'include/updatearEvento.php',
            async: true,
            data: {"idEvento": idEvento, "start": start, "end": end},
            method: 'POST',
            beforeSend: function() {
                $('.progress').slideDown();
            },
            success: function(output) {
                if (output === '1') {
                    //console.log(output);
                    $('.progress').slideUp();

                }
            }//success
        });//ajax

    };
</script><!-- update -->
<script>
    var verify = function(event) {
        //verificacion en la base de datos (si hay algun evento a la misma hora en el mismo lugar)
        // alert(event.idEco+' '+event.start.format());
        $.ajax({
            url: 'include/verificaEco.php',
            async: true,
            data: {"idEco": event.idEco, "start": event.start.format()},
            method: 'POST',
            success: function(output) {
                if (output === 'false') {
                    $(".modal-body").html('<div class="alert alert-danger">La Eco se encuentra asignada a otra persona, corrija el error.</div>');
                    $("#myModal").modal('show');
                }
            }// success
        });//ajax

        $.ajax({
            url: 'include/verificaTM.php',
            async: true,
            data: {"idTM": event.idTM, "start": event.start.format()},
            method: 'POST',
            success: function(output) {
                if (output) {

                }
            }// success
        });//ajax

        //se hacen las verificaciones del evento
        //se actualiza en la bbdd el elemento o se guarda si no existe
    };
</script><!-- verify -->
<script>
    var deleteEvent = function(event, jsEvent) {
        var trashEl = jQuery('#deleteArea');
        var ofs = trashEl.offset();

        var x1 = ofs.left;
        var x2 = ofs.left + trashEl.outerWidth(true);
        var y1 = ofs.top;
        var y2 = ofs.top + trashEl.outerHeight(true);

        if (jsEvent.pageX >= x1 && jsEvent.pageX <= x2 &&
                jsEvent.pageY >= y1 && jsEvent.pageY <= y2) {
            var confirma = confirm('Seguro que desea eliminar el evento?');
            if (confirma) {
                //console.log(event.id);
                $('#calendar').fullCalendar('removeEvents', event._id);
                $.ajax({
                    url: 'include/eliminarEvento.php',
                    async: true,
                    data: {"idEvento": event.id},
                    method: 'POST',
                    beforeSend: function() {
                        $('.progress').slideDown();
                    },
                    success: function(output) {
                        if (output === '1') {
                            $('.progress').slideUp();
                        }//si se borro de la base de datos
                    }//success
                });//ajax */
            }//si confirma
        }//si se arrojo evento en trashcan
    };//deleteEvent

</script>
<script>
    /*$('.btn').click(function() {
     $('#warnings').modal('show');
     });*/
</script>
<script src="include/filtro.js"></script>
</html>
