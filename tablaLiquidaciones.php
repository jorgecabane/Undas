<?php
include_once "/Include/meses.php";
include_once "/querys/getLiquidaciones.php";
include_once "/querys/getTM.php";
$mes = $_POST ['mes'];
//div en caso de errores ( horasRealizadas sin valoresHora asociadas)
echo"<div id='errores'></div>";
echo"<div id='myChart'></div>";
//aqui parte Resumen Fecha y TM
$ruttm=getTM();

$liquidaciones = getLiquidaciones ($mes );
print_r($liquidaciones);
echo "<h3 align='center'>Resumen Liquidaciones</h3>
	  <table id='t01' class='table table-hover table-bordered' style='width: 95%' align='center' >
	   <tr>
        <th><font color='green'>Nombre Tecnologo</font></th>
        <th><font color='green'>Total liquidacion</font></th> 
       </tr>";
    
Foreach($ruttm as $tm){
	if(isset($liquidaciones[$tm['Rut']][0])){
	echo "<tr  bgcolor='#c1c1a4' ><th>";
    echo $liquidaciones[$tm['Rut']][0]; 
    echo "</th><th>" ;
  	echo "$".number_format($liquidaciones[$tm['Rut']][1]);  
    echo "</th></tr>";
	}
}
echo "</table>"
?>
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
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        percentageInnerCutout: 30,
        responsive: true,
        onAnimationComplete: function() {
            this.showTooltip(this.segments, true);
        }
    });
    $('.chartLegend').html(Grafico.generateLegend());
</script>
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