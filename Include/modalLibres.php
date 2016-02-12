<div id="modalLibres" class="modal fade" style="overflow: hidden;">
    <div class="modal-dialog" style="margin-right: 0; margin-left: 0;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Tecnólogos Médicos no asignados</h4>

            </div>
            <div class="modal-body">
         
         <!-- 
         
                     <div class="panel-heading">
                <h4 class='panel-title'>
                    <strong>Tecn&oacute;logos M&eacute;dicos no asignados</strong>
                </h4>
            </div>
            <div id="progress" class="progress" style="display: none">
                <div class="progress-bar progress-bar-striped active"
                     role="progressbar" style="width: 100%">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
            <div class="panel-body row-fluid">
                <div class="col-sm-12 well well-sm well-titles">
                    <form class="form-inline text-center">
                        <div class="form-group">
                            <label for="start">Inicio</label> <input class="form-control"
                                                                     type="text" id="start" name="from"> <label for="end">Final</label>
                            <input class="form-control" type="text" id="end" name="to">
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                            <h4>De
                                <span id="rangoStart">8:30</span> a
                                <span id="rangoEnd">20:00</span>
                                Horas
                            </h4>
                            <div id="slider"></div>
                            <br>
                        </div>
                    </form>
                </div>
                <div class="well well-sm col-sm-6" style="max-height: 400px;">
                    <h4>Tecn&oacute;logos libres</h4>
                    <canvas id="myChart"></canvas>
                    <div class="chartLegend"></div>
                </div>
                <div class="well well-sm col-sm-6" id="libres"
                     style="overflow-y: auto; max-height: 400px;">
                    <div class="alert alert-info">Seleccione un rango</div>
                </div>
                <div class="col-sm-12 alert alert-warning center-block text-center">
                    <strong>Nota:</strong> Los TM que se encuentran en el listado no
                    tienen <u>Ning&uacute;n</u> evento asignado en el per&iacute;odo de tiempo
                    seleccionado.
                </div>
            </div>
         
          -->
         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
$(document).ready(function() {
$("#modalLibres").draggable({
    handle: ".modal-header"
});
});
</script>
<script>
    $(function() {
        var hoy = moment().format('YYYY-MM-DD');
        $('#start').val(hoy);
        $('#end').val(hoy);
        getDisponibles();
        $("#start").datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            changeYear: true,
            onClose: function(selectedDate) {
                $("#end").datepicker("option", "minDate", selectedDate);
            },
            dateFormat: "yy-mm-dd"
        });

        $("#end").datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            changeYear: true,
            onClose: function(selectedDate) {
                $("#start").datepicker("option", "maxDate", selectedDate);
            },
            dateFormat: "yy-mm-dd"
        });
    });
</script>
<!-- creacion del datepicker -->
<script>
$(document).ready(function() {
// Get context with jQuery - using jQuery's .get() method.
    var ctx = $("#myChart").get(0).getContext("2d");
// This will get the first returned node in the jQuery collection.

    var data = [{
            value: 21,
            color: '#FAA523',
            label: 'No Asignados'
        }, {
            value: 0,
            color: '#055683',
            label: 'Asignados'
        }];

    Grafico = new Chart(ctx).Doughnut(data, {
        animateScale: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        percentageInnerCutout: 30,
        responsive: true,
        onAnimationComplete: function() {
            this.showTooltip(this.segments, true);
        }
    });
    $('.chartLegend').html(Grafico.generateLegend());
});//ready
</script>
<!-- inicializacion del chart -->
<script>
    var getDisponibles = function() {
        start = $("#start").val() + ' ' + $('#rangoStart').text() + ':00';
        end = $("#end").val() + ' ' + $('#rangoEnd').text() + ':00';

        $.ajax({
            url: 'Include/disponibles.php',
            async: true,
            data: {"start": start, "end": end},
            method: 'POST',
            beforeSend: function() {
                $('#progress').slideDown('slow');
            },
            success: function(output) {
                $('#progress').slideUp('slow');
                output = $.parseJSON(output);
                libres = 0;

                $('#libres').html('');
                //console.log(output);
                $.each(output, function(index, value) {
                    if (index !== 0) {
                        if (value.nombreTM) {
                            libres++;//cantidad de TMs disponibles o libres en el intervalo seleccionado
                            $('#libres').append('<div class="alert alert-sm alert-info">' + value.nombreTM + '</div>');
                        }
                        else {
                            $('#libres').append('<div class="alert alert-sm alert-warning">No hay TM libres en el rango seleccionado</div>');
                        }
                    } else {
                        total = value.tms;
                    }
                });
                //console.log(libres);
                //console.log(total);
                Grafico.segments[0].value = libres;
                Grafico.segments[1].value = total - libres;
                Grafico.update();


            }//success
        });//ajax

    };//function getDisponibles
</script>
<script>
    $(document).ready(function() {
        $('#start, #end, #slider').change(getDisponibles);//change
        getDisponibles;
        $("#slider").slider({
            range: true,
            min: 480,
            max: 1260,
            step: 15,
            values: [510, 1200],
            slide: function(e, ui) {
                var hours1 = Math.floor(ui.values[0] / 60);
                var minutes1 = ui.values[0] - (hours1 * 60);

                var hours2 = Math.floor(ui.values[1] / 60);
                var minutes2 = ui.values[1] - (hours2 * 60);

                if (hours1.toString().length === 1) {
                    hours1 = '0' + hours1;
                }
                if (minutes1.toString().length === 1) {
                    minutes1 = '0' + minutes1;
                }
                if (hours2.toString().length === 1) {
                    hours2 = '0' + hours2;
                }
                if (minutes2.toString().length === 1) {
                    minutes2 = '0' + minutes2;
                }

                $('#rangoStart').html(hours1 + ':' + minutes1);
                $('#rangoEnd').html(hours2 + ':' + minutes2);
            },
            change: getDisponibles
        });//slider
    });//ready
</script>

