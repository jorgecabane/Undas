<?php
<<<<<<< HEAD
session_start ();
include "header.php";
include "include/verificacionUsuario.php";
=======
session_start();
include_once dirname(__FILE__)."/header.php";
include_once dirname(__FILE__)."/Include/verificacionUsuario.php";
>>>>>>> origin/master
?>
<div class="container-fluid well">
	<div class="row">
		<div class="col-sm-6 panel panel-info">
			<div class="panel-heading">
				<h4>
					<strong>TMs No asignados</strong>
				</h4>
			</div>
			<div class="progress" style="display: none">
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
					</form>
				</div>
				<div class="well well-sm col-sm-6" style="max-height: 400px;">
					<h4>TMs libres</h4>
					<canvas id="myChart"></canvas>
					<div class="chartLegend"></div>
				</div>
				<div class="well well-sm col-sm-6" id="libres"
					style="overflow-y: auto; max-height: 400px;">
					<div class="alert alert-info">Seleccione un rango</div>
				</div>
				<div class="col-sm-12 alert alert-warning center-block text-center">
					<strong>Nota:</strong> Los TM que se encuentran en el listado no
					tienen <u>Ningun</u> evento asignado en el periodo de tiempo
					seleccionado.
				</div>
			</div>

		</div>
		<div class="col-sm-6 panel panel-success">
			<div class="panel-heading">
				<h4>Otro Widget</h4>
			</div>
			<div class="progressHoras" style="display: none">
				<div class="progress-bar progress-bar-striped active"
					role="progressbar" style="width: 100%">
					<span class="sr-only">Cargando...</span>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-sm-12 well well-sm well-titles">
					<form class="form-inline text-center">
						<div class="form-group">
							<label for="start">Dia</label> <input class="form-control"
								type="text" id="dia" name="dia"> <label for="start">Hora Inicio</label>
							<input class="form-control" type="text" id="horastart"
								name="horastart"> <label for="start">Hora Termino</label> <input
								class="form-control" type="text" id="horaend" name="horaend">
						</div>
					</form>
				</div>
				<div class="well well-sm col-sm-6" style="max-height: 400px;">
					<h4>TMs libres</h4>
					<canvas id="grafico"></canvas>
					<div class="chartLegend"></div>
				</div>
				<div class="well well-sm col-sm-6" id="libresHoras"
					style="overflow-y: auto; max-height: 400px;">
					<div class="alert alert-info">Seleccione un rango</div>
				</div>
				<div class="col-sm-12 alert alert-warning center-block text-center">
					<strong>Nota:</strong> Los TM que se encuentran en el listado no
					tienen <u>Ningun</u> evento asignado en el periodo de tiempo
					seleccionado.
				</div>
			</div>
		</div>
	</div>



	</body>
	<script>
    $(function() {
        var hoy = moment().format('YYYY-DD-MM');
        $('#start').val(hoy);
        $('#end').val(hoy);

        $("#start").datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            onClose: function(selectedDate) {
                $("#end").datepicker("option", "minDate", selectedDate);
            },
            dateFormat: "yy-mm-dd"
        });

        $("#end").datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            onClose: function(selectedDate) {
                $("#start").datepicker("option", "maxDate", selectedDate);
            },
            dateFormat: "yy-mm-dd"
        });
    });
</script>
	<!-- creacion del datepicker -->
	<script>
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
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        percentageInnerCutout: 30,
        responsive: true,
        onAnimationComplete: function() {
            this.showTooltip(this.segments, true);
        }
    });
    $('.chartLegend').html(Grafico.generateLegend());
    </script>
	<!-- inicializacion del chart -->
	<script>
    $(document).ready(function() {
        $('#start, #end').change(function() {
            start = $.datepicker.formatDate('yy-mm-dd', $('#start').datepicker('getDate'));
            end = $.datepicker.formatDate('yy-mm-dd', $('#end').datepicker('getDate'));
            $.ajax({
                url: 'Include/disponibles.php',
                async: true,
                data: {"start": start, "end": end},
                method: 'POST',
                beforeSend: function() {
                    $('.progress').slideDown('slow');
                },
                success: function(output) {
                    $('.progress').slideUp('slow');
                    output = $.parseJSON(output);
                    libres = 0;

                    $('#libres').html('');
                    $.each(output, function(index, value) {
                        if (index !== 0) {
                            libres++; //cantidad de TMs disponibles o libres en el intervalo seleccionado

                            $('#libres').append('<div class="alert alert-sm alert-info">' + value.nombreTM + '</div>');
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

        });//change
    });//ready
</script>


	<script>
	// aqui parte la copia para el segundo script////////////////////////////////////////////////////////////////////////////////////////
    $(function() {
        var hoy = moment().format('YYYY-DD-MM');
        $('#dia').val(hoy);
            $("#dia").datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            dateFormat: "yy-mm-dd"
        });
    });
</script>
	<script>
    // Get context with jQuery - using jQuery's .get() method.
    var ctx = $("#grafico").get(0).getContext("2d");
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

    GraficoHoras = new Chart(ctx).Doughnut(data, {
        animateScale: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        percentageInnerCutout: 30,
        responsive: true,
        onAnimationComplete: function() {
            this.showTooltip(this.segments, true);
        }
    });
    $('.chartLegend').html(GraficoHoras.generateLegend());
    </script>
	<script>
    $(document).ready(function() {
        $('#dia, #horastart, #horaend').change(function() {
            dia = $.datepicker.formatDate('yy-mm-dd', $('#dia').datepicker('getDate'));
            horastart = $("#horastart").val();
           
           horaend = $("#horaend").val();
            $.ajax({
                url: 'include/disponibles.php',
                async: true,
                data: {
                    "dia": dia, 
                	"horastart": horastart
              	   ,"horaend": horaend
                    
                    },
                method: 'POST',
                beforeSend: function() {
                    $('.progressHoras').slideDown('slow');
                },
                success: function(output) {
                    $('.progressHoras').slideUp('slow');
                    output = $.parseJSON(output);
                    libres = 0;

                    $('#libresHoras').html('');
                    $.each(output, function(index, value) {
                        if (index !== 0) {
                            libres++; //cantidad de TMs disponibles o libres en el intervalo seleccionado

                            $('#libresHoras').append('<div class="alert alert-sm alert-info">' + value.nombreTM + '</div>');
                        } else {
                            total = value.tms;
                        }
                    });
                    //console.log(libres);
                    //console.log(total);
                    GraficoHoras.segments[0].value = libres;
                    GraficoHoras.segments[1].value = total - libres;
                    GraficoHoras.update();


                }//success
            });//ajax

        });//change
    });//ready
</script>

	</html>
