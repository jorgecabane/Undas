<?php
session_start();
require_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
$idCentro = $_GET ['idCentro'];
$centro = $_GET ['centro'];
?>

<div class='container-fluid'>
    <div class='row well well-sm well-titles'>
        <div class="col-md-1 col-md-offset-3 hidden-print">
            <center>
                <div class="btn-group">
                    <button id="deleteArea" class="btn btn-danger dropdown-toggle btn-block btn-lg" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Borrar <span class="glyphicon glyphicon-trash"></span> <span class="caret"></span>

                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="deleteWeek" class="btn">Borrar esta semana</a></li>
                        <li><a id="deleteMonth" class="btn">Borrar este mes</a></li>
                    </ul>
                </div>
            </center>
        </div>
        <div class='col-md-4'>
            <div class="row">
                <center>
                    <h2>
                        <span class="label label-info label-block" id="centro" idCentro="<?php echo $idCentro; ?>">
                            Centro: <b><?php echo $centro; ?></b>
                        </span>
                    </h2>
                </center>

            </div>
        </div>
        <!-- Single button -->
        <div class="col-md-1 hidden-print">
            <center>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Repetir
                        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn" id="repeatWeek">Repetir semana</a></li>
                    </ul>
                </div>
            </center>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-2 hidden-sm hidden-xs well well-sm'>
            <div class="panel panel-info">
                <div class="panel-heading"><h4 class='panel-title'>Seleccionar Eco</h4></div>
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
                    <select class="form-control" id="selectTM">
                        <option value="TM">Listado TM</option>
                        <option value="doctores">Listado Doctores</option>
                    </select>
                </div>
                <div class="panel-body">
                    <div class='form-group has-feedback'>
                        <input type='text' id='search' class='form-control' placeholder='Filtrar por Nombre'>
                    </div>
                    <div  id='external-events'>
                        <hr class='hr-sm'>
                        <div class='form-group has-success'>
                            <input type='text' id='prestacionFilter' class='form-control' placeholder='Filtrar por Prestación'>
                        </div>
                        <?php
                        $tms = getTM();
                        foreach ($tms as $tm) {
                            echo "<a class='label fc-event' role='button' data-toggle='collapse' href='#tm" . $tm['idTM'] . "' aria-expanded='false' aria-controls='tm" . $tm['idTM'] . "' event-color='" . $ecos[0]['color'] . "' idTM='" . $tm['idTM'] . "' style='background-color: " . $ecos[0]['color'] . "; border-color: " . $ecos[0]['color'] . ";'><span class='glyphicon glyphicon-plus-sign pull-right'></span>" . $tm ['Nombre'] . " " . $tm ['Apellido'] . "</a>
                                <div id='tm" . $tm['idTM'] . "' idTM='" . $tm['idTM'] . "' class='collapse prestaciones' nombretm='" . $tm['Nombre'] . "'>Prestaciones:<br>
                                    ";
                            $prestaciones = getPrestacionesCentro($tm['Rut'], $idCentro);
                            if ($prestaciones) {
                                foreach ($prestaciones as $prestacion) {
                                    $especifico = $prestacion['Especifico'];
                                    echo "<div class='alert alert-sm alert-info prestacion'>$especifico</div>";
                                }//cada una de las prestaciones
                            }//si hay prestaciones
                            else {
                                echo "<div class='alert alert-sm alert-warning'>No hay asignadas</div>";
                            }
                            echo"</div>
                                ";
                        }//cada uno de los TM
                        ?>
                        <!-- Generacion de listado de TMs -->
                    </div>

                    <div id="medicos" style="display:none;">
                        <hr class="hr-sm">
                        <?php
                        $medicos = getMedicos();
                        if ($medicos) {
                            foreach ($medicos as $medico) {
                                echo "<div class='fc-event medico' event-color='#ffaa00' idTM='" . $medico['idTM'] . "'>" . $medico['Nombre'] . " " . $medico['Apellido'] . "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-10 well well-sm' >
            <div class="progress" style="display:none">
                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
            <div id="horarioContent" class="alert alert-info" style="display:none"></div>
            <!-- calendario -->
            <div class="col-sm-2 hidden-print tight">
                <div class="alert alert-info alert-sm" >
                    <center>CUPOS/MES:<span id="cupos" class="badge badge-warning"></span><span class="glyphicon glyphicon-hourglass"></span></center></div>
            </div>
            <div class="col-sm-1 hidden-print tight">
                <button class="btn btn-danger btn-block" onClick="window.print();" id="descargar" data-toggle="tooltip" data-placement="left" title="Imprimir o Descargar PDF!">
                    <span class="glyphicon glyphicon-print"></span> /
                    <span class="glyphicon glyphicon-save"></span>
                </button>
            </div>
            <div class="col-sm-1 hidden-print tight">
                <button class="btn btn-success btn-block" id="refreshCalendar" data-toggle="tooltip" data-placement="left" title="Recargar Calendario!">
                    <span class="glyphicon glyphicon-refresh"></span>
                </button>
            </div>
            <div id='calendar'></div>
            <!-- calendario -->
        </div>
        <div style='clear: both'></div>
        <div class='alert alert-warning visible-print-block extraPrint'>Información adicional para la impresión</div>
    </div>
    <!-- row -->
</div>

<!-- container-fluid -->
</body>
<?php include_once dirname(__FILE__) . '/Include/modalVerificaciones.php'; //modal para los mensajes de verificacion ?>
<?php include_once dirname(__FILE__) . '/Include/modalEvento.php'; //modal para los eventos desde vista mes ?>
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

                            $('#external-events .fc-event, .medico').each(function() {
                                if ($(this).hasClass('medico')) {
                                    color = '#ffaa00'; //modificar para mantener el color de los medicos
                                } else {
                                    $(this).css('background', color).css('border', color).css("line-height", "1.45");
                                    $(this).attr('event-color', color); // se asigna el color de la eco correspondiente a cada elemento
                                }

                                idTM = $(this).attr('idTM');
                                nombreApellido = $.trim($(this).text()).split(" ", 2);
                                $(this).data('event', {
                                    title: eco, // use the element's text as the event title
                                    description: nombreApellido,
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

                        $('#external-events .fc-event, .medico').each(function() {
                            /*
                             * funcion que asigna el event a un pill de TM la primera vez
                             * que se crean los pills
                             */
                            color = $(this).attr('event-color');
                            eco = $('#ecos option:selected').text();
                            idEco = $('#ecos').val();
                            idTM = $(this).attr('idTM');
                            nombreApellido = $.trim($(this).text()).split(" ", 2);
                            // store data so the calendar knows to render an event upon drop
                            $(this).data('event', {
                                title: eco, // use the element's text as the event title
                                description: nombreApellido,
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
<script src="Include/js/saveBD.js"></script><!-- SAVEBD -->
<script src="Include/js/eventReceive.js"></script><!-- eventReceive -->
<script src="Include/js/updateEvent.js"></script><!-- update -->
<script src="Include/js/verifyEvent.js"></script><!-- verifyEvent -->
<script src="Include/js/deleteEvent.js"></script><!-- deleteEvent -->
<script src="Include/js/renderEvent.js"></script><!-- renderEvent -->
<script src="Include/js/switchView.js"></script><!-- switchView -->
<script src="Include/js/repeatWeek.js"></script><!-- repeatWeek -->
<script src="Include/js/deleteWeek.js"></script><!-- deleteWeek -->
<script src="Include/js/deleteMonth.js"></script><!-- deleteMonth -->
<script src="Include/js/getCupos.js"></script><!-- getCupos -->
<script>
    //$('#external-events').collapse({parent: '.fc-event'}); //creacion de los espacios para colapsar
    $('a.label').click(function() {
        $(this).find('.glyphicon').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
    });

</script><!-- collapse prestaciones -->
<script>
    /* initialize the calendar
     -----------------------------------------------------------------*/
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            eventSources: [
                {"url": "Include/feedEventosCentro.php?idCentro=<?php echo $idCentro; ?>",
                    "constraint": "businessHours"
                },
                {"url": "Include/feedEventosMedico.php?idCentro=<?php echo $idCentro; ?>",
                    "constraint": "businessHours",
                    "color": '#ffaa00'
                },
                {
                    "url": "Include/feedFeriados.php",
                    "overlap": false,
                    "rendering": "background",
                    "color": '#6B685D'
                }

            ], //eventSources
            eventRender: renderEvent,
            eventDrop: updateEvent,
            eventResize: updateEvent,
            eventDragStop: deleteEvent,
            viewRender: switchView,
            eventReceive: eventReceive,
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
            loading: loading,
            displayEventEnd: true,
            timeFormat: 'H:mm'

        });

    });//document.ready
</script><!-- fullCalendar -->
<script>
    var loading = function(isLoading, view) {
        if (isLoading) {
            $('.loading-screen').show();
        } else {
            $('.loading-screen').hide();
        }
    };
</script><!-- loading del calendario!-->
<script>
    $(document).ready(function() {
        $('#refreshCalendar').click(function() {
            $('#calendar').fullCalendar('refetchEvents');
        });
    });
</script><!-- refresh del calendario -->
<script>
    $(document).ready(function() {
        $('#selectTM').change(function() {
            $('#external-events').slideToggle('slow');
            $('#medicos').slideToggle('slow');
        });//change selectTM
    });//document
</script><!-- display de Medicos/TM-->
<script src="Include/filtro.js"></script>
</html>