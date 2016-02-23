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
                        <span class="label label-info label-block" id="centro" idCentro="<?php echo $idCentro; ?>">
                            Centro: <b><?php echo $centro; ?></b>
                        </span>
                    </h2>
                </center>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 well well-sm hidden-print">
            <center><h3>Listado TM</h3></center>
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
                    echo "<a class='label fc-event' role='button' data-toggle='collapse' href='#tm" . $tm['idTM'] . "' aria-expanded='false' aria-controls='tm" . $tm['idTM'] . "' idTM='" . $tm['idTM'] . "'><span class='glyphicon glyphicon-plus-sign pull-right'></span>" . $tm ['Nombre'] . " " . $tm ['Apellido'] . "</a>
                                <div id='tm" . $tm['idTM'] . "' idTM='" . $tm['idTM'] . "' class='prestaciones collapse' nombretm='" . $tm['Nombre'] . "'>Prestaciones:<br>
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
        </div><!-- listado de tms -->
        <div class="col-sm-10 well well-sm">
            <div class="col-sm-2 hidden-print tight">
                <div class="alert alert-info alert-sm" >
                    <center>CUPOS/MES:<span id="cupos" class="badge badge-warning"></span><span class="glyphicon glyphicon-hourglass"></span></center></div>
            </div>
            <div class="col-sm-1 hidden-print tight">
                <button class="btn btn-danger btn-block" onClick="window.print();" id="descargar" data-toggle="tooltip" data-placement="left" title="Descargar PDF!">
                    <span class="glyphicon glyphicon-print"></span>
                </button>
            </div>
            <div id='calendar' ></div>
        </div>
    </div>
</div>


<script src="Include/filtro.js"></script>
<script src="Include/getCupos.js"></script><!-- getCupos -->
<script>
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
                            header: {
                                left: 'prev,today,next',
                                center: 'title',
                                right: 'agendaDay,agendaWeek,month'
                            },
                            eventRender: function(event, element) {
                                element.find('.fc-title').append("<br/>" + event.nombreTM + "<br/>" + event.apellidoTM);
                                element.attr("idTM", event.idTM);
                                //al hacer click se puede ver el detalle
                                element.popover({
                                    title: 'Detalles del Evento (' + event.id + ')',
                                    content: '<div><b>Eco: </b>' + event.title + '<br>\n\
                             <b>TM: </b>' + event.nombreTM + " " + event.apellidoTM + '<br>\n\
                             <b>Fecha: </b>' + event.start.format('LL') + '<br>\n\
                             <b>Inicio: </b>' + event.start.format("HH:mm") + '<br>\n\
                             <b>Termino: </b>' + event.end.format("HH:mm") + '\n\
                             </div>',
                                    html: true,
                                    animation: true,
                                    placement: 'auto'
                                });//popover
                            },
                            defaultView: 'month',
                            viewRender: getCupos,
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
<script>
    $('a.label').click(function() {
        $(this).find('.glyphicon').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
    });
</script>
