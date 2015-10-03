<?php
session_start();
require_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
$idCentro = $_GET ['idCentro'];
$centro = $_GET ['centro'];
?>

<div class='container-fluid'>
    <div class='row'>
        <div class="col-md-1 col-md-offset-3 well well-sm well-titles hidden-print">
            <center>
                <div class="btn-group">
                    <button id="deleteArea" class="btn btn-danger dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Borrar <span class="glyphicon glyphicon-trash"></span> <span class="caret"></span>

                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="deleteWeek" class="btn">Borrar esta semana</a></li>
                        <li><a id="deleteMonth" class="btn">Borrar este mes</a></li>
                    </ul>
                </div>
            </center>
        </div>
        <div class='col-md-4 well well-sm well-titles'>
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
        <!-- Single button -->
        <div class="col-md-1 well well-sm well-titles hidden-print">
            <center>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Repetir
                        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn" id="repeatWeek">Repetir semana</a></li>
                        <li><a href="#" class="btn" id="repeatMonth">Repetir mes</a></li>
                    </ul>
                </div>
            </center>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-2 hidden-sm hidden-xs well well-sm'>
            <div class="panel panel-info">
                <div class="panel-heading"><h4>Seleccionar Eco</h4></div>
                <div class="panel-body">
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
                </div>
            </div>
            <div class='panel panel-info'>
                <div class="panel-heading">
                    <select class="form-control">
                        <option value="TM">Listado TMs</option>
                        <option value="doctores">Listado Doctores</option>
                        <option value="feriado">Feriado</option>
                    </select>
                </div>
                <div class="panel-body">
                    <input type='text' id='search' class='form-control'
                           placeholder='Filtrar por Nombre'>
                    <hr class='hr-sm'>
                    <div  id='external-events'>
                        <?php
                        $tms = getTM();
                        foreach ($tms as $tm) {
                            echo "<a class='label fc-event' role='button' data-toggle='collapse' href='#" . $tm['Nombre'] . "' aria-expanded='false' aria-controls='" . $tm['Nombre'] . "' event-color='" . $ecos[0]['color'] . "' idTM='" . $tm['idTM'] . "' style='background-color: " . $ecos[0]['color'] . "; border-color: " . $ecos[0]['color'] . ";'>" . $tm ['Nombre'] . " " . $tm ['Apellido'] . "</a>
                                <div id='" . $tm['Nombre'] . "' class='collapse'>prestaciones de " . $tm['Nombre'] . "</div>";
                        } // <div class='fc-event label label-info label-block' event-color='#2b95ce'>Juan Perez</div>
                        ?>
                        <!-- Generacion de listado de TMs -->
                    </div>
                    <!-- <Ma href='#' class='btn btn-warning btn-block'>Ejecutar</a> -->
                </div>
            </div>
        </div>
        <div class='col-md-10 well well-sm' >
            <div class="progress" style="display:none">
                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
            <div id="horarioContent" class="alert alert-info" style="display:none">

            </div>
            <!-- calendario -->
            <div class="col-sm-1 hidden-print">
                <button class="btn btn-danger btn-block" onClick="window.print()" id="descargar" data-toggle="tooltip" data-placement="left" title="Descargar PDF!">
                    <span class="glyphicon glyphicon-print"></span>
                </button>
            </div>
            <div id='calendar'></div>
            <!-- calendario -->
        </div>
        <div style='clear: both'></div>
        <div class='alert alert-warning visible-print-block'>Informacion adicional para la impresion</div>
    </div>
    <!-- row -->
</div>

<!-- container-fluid -->
</body>
<?php include_once dirname(__FILE__) . '/Include/modalVerificaciones.php'; //modal para los mensajes de verificacion?>
<?php include_once dirname(__FILE__) . '/Include/modalEvento.php'; //modal para los eventos desde vista mes?>
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
                                $(this).css('background', color).css('border', color).css("line-height", "1.45");
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

                        });//each
                    });//ready
</script><!-- cambio de las ecos -->
<script>
    var saveBD = function(event) {
        if (event.start.hasTime()) {
            start = event.start.format();
            end = event.end.format();
        } else {
            var inicio = prompt('Debe ingresar un inicio para el evento (ej. 8.00)');
            var fin = prompt('Debe ingresar un termino al evento (ej. 11.30)');
            //console.log();
            start = event.start.format() + 'T' + inicio.replace('.', ':') + ':00';
            end = event.start.format() + 'T' + fin.replace('.', ':') + ':00';
        }
        idTM = event.idTM;
        idEco = event.idEco;

        if (event.fromBD === 0) {
            if (event.saved === 0) {
                //si el evento no se encuentra guardado en la bbdd
                //armado de JSON para envio de datos
                $.ajax({
                    url: 'Include/insertarEvento.php',
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
                            if ($('#calendar').fullCalendar('getView').name === 'month') {
                                $('#calendar').fullCalendar('refetchEvents');
                            }
                            else {
                                $('#calendar').fullCalendar('updateEvent', event);
                            }

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
            url: 'Include/updatearEvento.php',
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
            url: 'Include/verificaEco.php',
            async: true,
            data: {"idEco": event.idEco, "start": event.start.format()},
            method: 'POST',
            success: function(output) {
                if (output === 'false') {
                    $("#myModal.modal-body").html('<div class="alert alert-danger">La Eco se encuentra asignada a otra persona, corrija el error.</div>');
                    $("#myModal").modal('show');
                }
            }// success
        });//ajax

        $.ajax({
            url: 'Include/verificaTM.php',
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
    $(document).ready(function() {
        function createEvent(event) {
            //obtencion de los valores seleccionados
            start = event.start.format() + ' ' + $('#rangoStart').text() + ':00';
            end = event.start.format() + ' ' + $('#rangoEnd').text() + ':00';

            //se crea un evento con datos correctos
            evento = {
                title: event.title,
                start: start,
                end: end,
                idEco: event.idEco,
                idTM: event.idTM,
                saved: event.saved,
                color: event.color,
                description: event.description,
                fromBD: event.fromBD,
                editable: true
            };
            //render del evento
            $('#calendar').fullCalendar('renderEvent', evento);
        }
    });
</script><!-- createEvent -->
<script>
    var receive = function(event) {
        /*
         * funcion que se corre si el evento no tiene hora asignada
         * (creado desde la vista mensual)
         */
        //view = $('#calendar').fullCalendar('getView').name;
        if (!event.start.hasTime()) {//si no tiene hora asignada
            $('#eventDate').html(event.start.format());//se obtiene la fecha ingresada
            $("#modalEvento").modal('show');//se muestra el modal
            $("#asignTime").click(function() {
                createEvent(event);
                //finalizacion (cerrado del modal)
                console.log(evento);
                $("#modalEvento").modal('hide');
            });
        }

    };//function drop
</script><!-- receive -->
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
            //var confirma = confirm('Seguro que desea eliminar el evento?');
            confirma = true;//para pruebas
            if (confirma) {
                //console.log(event.id);
                $('#calendar').fullCalendar('removeEvents', event._id);
                $.ajax({
                    url: 'Include/eliminarEvento.php',
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

</script><!-- deleteEvent -->
<script>
    var renderEvent = function(event, element) {
        if (event.start.hasTime()) {
            //se agrega la descripcion al evento
            element.find('.fc-title').append("<br/>" + event.description);
            //al hacer click se puede ver el detalle
            element.popover({
                title: 'Detalles del Evento',
                content: '<div><b>Eco: </b>' + event.title + '<br>\n\
                             <b>TM: </b>' + event.description + '<br>\n\
                             <b>Fecha: </b>' + event.start.format('LL') + '<br>\n\
                             <b>Inicio: </b>' + event.start.format("HH:mm") + '<br>\n\
                             <b>Termino: </b>' + event.end.format("HH:mm") + '\n\
                             </div>',
                html: true,
                animation: true
            });//popover
        } else {
            //return false;// si el evento no tiene hora que no se incluya en el calendar

        }
    };
</script><!-- renderEvent -->
<script>
    var switchView = function(view) {
        switch (view.name) {
            case 'month':
                $('#repeatWeek, #deleteWeek').addClass('disabled');
                $('#repeatMonth, #deleteMonth').removeClass('disabled');
                break;
            case 'agendaWeek':
                $('#repeatWeek, #deleteWeek').removeClass('disabled');
                $('#repeatMonth, #deleteMonth').addClass('disabled');
                break;
            case 'agendaDay':
                $('#repeatWeek, #repeatMonth, #deleteWeek, #deleteMonth').addClass('disabled');
        }
    };
</script><!-- switchView -->
<script>
    $(document).ready(function() {
        $('#repeatWeek').click(function() {
            cantidad = $('#calendar .fc-event').size(); //cantidad de eventos a repetir
            if (cantidad !== 0) {// si hay
                if (confirm('Verifique que no está repitiendo eventos!, desea continuar?')) {
                    var weeks = prompt('Cuantas semanas?'); //se pregunta cuantas semanas ahead
                    weeks = parseInt(weeks); //transforma en num

                    if (Math.floor(weeks) === weeks && $.isNumeric(weeks)) { //si el valor es entero
                        $('#calendar').slideUp('slow'); //oculto el calendario
                        $('.progress').slideDown('slow').children('.progress-bar').css('width', '0%'); //barra de progreso
                        $('#horarioContent').text('Espere mientras se repiten los eventos...').slideDown(); //mensaje

                        count = 0;//contador de repeticiones

                        $('#calendar').fullCalendar('clientEvents', function(evento) {//array con los eventos del calendario
                            week = $('#calendar').fullCalendar('getView').intervalStart.format('w');//la semana que se esta viendo
                            if (evento.start.format('w') === week) { //si los eventos son de la semana
                                for (i = 0; i < weeks; i++) {
                                    start = evento.start.add(1, 'week').format(); //el horario mas una semana
                                    end = evento.end.add(1, 'week').format(); //el horario mas una semana
                                    idEco = evento.idEco; //en que eco se esta ejecutando
                                    idTM = evento.idTM; //que tm es el evento

                                    $.ajax({
                                        url: 'Include/insertarEvento.php',
                                        async: true,
                                        data: {"idTM": idTM, "idEco": idEco, "start": start, "end": end},
                                        method: 'POST',
                                        success: function(output) {
                                            if (output !== '0') {
                                                count++; //contador cuando un evento se inserta
                                                avance = (count / cantidad) * 100; //se calcula el % de avance
                                                if (avance === 100) { //si se termino de insertar todos (100%)
                                                    $('.progress-bar').css('width', avance + '%'); //se aumenta la barra
                                                    $('.progress').slideUp('slow'); //se esconde
                                                    $('#horarioContent').slideUp('slow'); //se esconde
                                                    $('#calendar').slideDown('slow'); //se muestra el calendario

                                                } else {
                                                    $('.progress-bar').css('width', avance + '%'); // cambia el % de avance
                                                }
                                            }//if
                                        }//success
                                    });//ajax */
                                }//for
                            }//solo para los eventos de la semana en curso
                        });//clientEvents callback
                    }//si el valor ingresado es numero
                    else {
                        alert('Debe ingresar un valor numerico');
                    }
                }//si confirma
            }//si hay eventos
            else {
                alert('No hay eventos que repetir!');
            }
        });//click
    });//ready
</script><!-- repeatWeek -->
<script>
    $(document).ready(function() {
        $('#repeatMonth').click(function() {
            cantidad = $('#calendar .fc-event').size(); //cantidad de eventos a repetir
            if (cantidad !== 0) {
                $('#calendar').slideUp('slow'); //oculto el calendario
                $('.progress').slideDown('slow').children('.progress-bar').css('width', '0%'); //barra de progreso
                $('#horarioContent').text('Espere mientras se repiten los eventos...').slideDown('slow'); //mensaje

                count = 0;//contador de repeticiones

                $('#calendar').fullCalendar('clientEvents', function(evento) {//array con los eventos del calendario
                    month = $('#calendar').fullCalendar('getView').intervalStart.format('M');

                    if (evento.start.format('M') === month) {
                        start = evento.start.add(1, 'M').format(); //el horario mas mes
                        end = evento.end.add(1, 'M').format(); //el horario mas un mes
                        idEco = evento.idEco; //en que eco se esta ejecutando
                        idTM = evento.idTM; //que tm es el evento
                        console.log('idEco:' + idEco + ' idTM:' + idTM + ' start:' + start + ' end:' + end);
                        $.ajax({
                            url: 'Include/insertarEvento.php',
                            async: false,
                            data: {"idTM": idTM, "idEco": idEco, "start": start, "end": end},
                            method: 'POST',
                            success: function(output) {
                                console.log('idEvento:' + output);
                                if (output !== '0') {
                                    count++; //contador cuando un evento se inserta
                                    avance = (count / cantidad) * 100; //se calcula el % de avance
                                    if (avance === 100) { //si se termino de insertar todos (100%)
                                        $('.progress-bar').css('width', avance + '%'); //se aumenta la barra
                                        $('.progress').slideUp('slow'); //se esconde
                                        $('#horarioContent').slideUp('slow'); //se esconde
                                        $('#calendar').slideDown('slow'); //se muestra el calendario

                                    } else {
                                        $('.progress-bar').css('width', avance + '%'); // cambia el % de avance
                                    }
                                }//if
                            }//success
                        });//ajax */
                    }//si corresponde al mismo mes
                });//"foreach" eventos del calendario

            }//if
        });//click
    });//ready
</script><!-- repeatMonth -->
<script>
    $('#external-events').collapse({
        parent: '.fc-event'
    });
</script><!-- collapse prestaciones -->
<script>
    $(document).ready(function() {
        $('#deleteWeek').click(function() {
            var confirmar = confirm('Está seguro que quiere eliminar todos los eventos de esta semana?');
            if (confirmar) {
                cantidad = $('#calendar .fc-event').size(); //cantidad de eventos a borrar
                contador = 0; //contador para saber cuando cerrar el progressbar
                $('.progress').slideDown('slow');//progress bar
                $('#calendar').fullCalendar('clientEvents', function(evento) {//each evento en el cliente
                    week = $('#calendar').fullCalendar('getView').intervalStart.format('w');//la semana que se esta viendo
                    if (evento.start.format('w') === week) { //si los eventos son de la semana
                        $('#calendar').fullCalendar('removeEvents', evento._id);
                        $.ajax({
                            url: 'Include/eliminarEvento.php',
                            async: true,
                            data: {"idEvento": evento.id},
                            method: 'POST',
                            success: function(output) {
                                if (output === '1') {
                                    contador++;
                                    if (contador === cantidad) {
                                        $('.progress').slideUp();
                                    }

                                }//si se borro de la base de datos
                            }//success
                        });//ajax */
                    }//si los eventos son del a semana
                });
            } else {

            }
        });//click #deleteWeek
    });//ready
</script><!-- deleteWeek -->
<script>
    /* initialize the calendar
     -----------------------------------------------------------------*/
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            eventSources: [{
                    url: "Include/feedEventosCentro.php?idCentro=<?php echo $idCentro; ?>"
                }], //eventSources
            eventRender: renderEvent,
            //eventAfterRender: saveBD,
            eventResize: update,
            eventDrop: update,
            eventDragStop: deleteEvent,
            viewRender: switchView,
            eventReceive: saveBD,
            header: {
                left: 'prev,today,next',
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
            //eventConstraint:"businessHours" ,
            slotEventOverlap: false,
            forceEventDuration: true,
            slotDuration: '00:15:00',
            defaultTimedEventDuration: '03:00:00',
            minTime: '08:00:00',
            maxTime: '21:00:00',
            defaultView: 'month',
            lazyFetch: true,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            hiddenDays: [0],
            contentHeight: 800,
            allDaySlot: false,
            displayEventEnd: true
        });

    });//document.ready
</script><!-- fullCalendar -->
<script src="Include/filtro.js"></script>
</html>