<?php
session_start ();
include_once "../Include/isAdmin.php";
include_once "../Include/meses.php";
include_once "../querys/getHoras.php";
include_once "../querys/getValorHora.php";
include_once "../querys/getExtras.php";
if ($_SESSION ["usuario"]) {
	if (isAdmin($_SESSION["idusuario"],$_SESSION ["context"]) == 1) {
		$admin = 1;
	} else {
		$admin = 0;
	}
}
$mes = $_POST ['mes'];
$rut = $_POST ['rut'];
echo "<br>";
//div en caso de errores ( horasRealizadas sin valoresHora asociadas)
echo"<div id='errores'></div>";

//aqui parte Resumen Fecha y TM
$Horas = getHoras ( $rut, $mes );
echo "<table id='t01' class='table table-hover table-bordered table-condensed table-responsive' style='max-width:80%; white-space: nowrap'>";
echo "<thead><tr class='primary'>";
echo "<th>Fecha: ";
echo "<span id='mes'>" . Mes ( $Horas [0] ['Mes'] ) . "</span>";
echo " ";
echo "<span id='year'>" . $Horas [0] ['Year'] . "</span>";
echo "</th>";
echo "</tr></thead>";

echo "<thead><tr class='primary'>";
echo "<th>TM: ";
echo $Horas [0] ['TMNombre'];
echo " " . $Horas [0] ['TMApellido'];
echo " </th>";
echo "</thead></tr>";
// Aqui termina Resumen Fecha y TM

// Aqui parte Valores Horas
echo "<thead><tr class='info'>";
echo "<th>Empresa</th>";
echo "<th>Valor Hora</th>";
echo "</thead></tr><tbody>";

$ValorHoras = getValorHora ( $rut );
if ($ValorHoras) {

	foreach ( $ValorHoras as $valores ) {
		?>
<tr class="hidden-print" style="display: none">

	<td><span class="CentroValorHora"><?php
		echo "<span class='nombreEmpresa' >";
		echo $valores ['Empresa'];
		echo "</span>";
		echo " ";
		echo "<span class='semanavalorhora'>";
		if ($valores ['Semana'] == 1) {
			echo 'Semana';
		} else {
			echo 'Sabado';
		}
		echo "</span>";
		?> </span></td>

	<td><span class='label label-success'>$ <span class='Valor'><?php echo $valores['Valor']; ?></span></span>

	</td>


</tr>

<?php
	}
}//si es que tiene valores hora asociadas
else { //caso de que no tenga valoreshora asociadas
	echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> TM no tiene Valores Hora asociados.
</div>';
}
//aqui termina valoresHora

//aqui emp�eza HorasRealizadas
echo "<thead><tr class='info'>";
echo "<th>Empresa</th>";
echo "<th>Horas Realizadas</th>";
echo "</thead></tr><tbody>";
if ($Horas) {
	foreach ( $Horas as $informacion ) {
		if($informacion['NombreEmpresa']!= "Sin Turno"){
			?>


<tr>
	<td><span class="CentroHoraRealizada"><?php echo $informacion['NombreEmpresa']; ?></span>
		<span class="semanahorarealizada"><?php

if ($informacion ['Semana'] == 7) {
			echo "Sabado";
		} else {
			echo "Semana";
		}
		?></span></td>
	<td><span class='label label-info'><span class="HorasRealizadas"><?php echo number_format($informacion['Horas'], 2); ?></span>
			horas </span></td>
</tr>
<?php
		}
}
} else {
	echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Tm no tiene Horas realizadas asociadas.
</div>';
}
echo "</tbody>";
// aqui termina HorasRealizadas

//aqui empieza Extras
echo "<thead ><tr colspan='2' class='info'>";
echo "<th>Extras";
if ($admin == 1) {
	echo "<input type='submit' value='Agregar Extra' class='btn btn-primary btnextra pull-right hidden-print' />";
}
echo "</th>";
echo "<th>Monto Total Extras</th>";
echo "</thead >";
echo "<tbody id='appendExtra'>";
$extras = getExtras ( $rut, $mes );
if ($extras) {
	foreach ( $extras as $extra ) {
		?>
<tr>
	<td>
		<?php
		echo "<span class='tituloExtra'>";
		echo $extra['Titulo'];
		echo "</span>";

		?>
		</td>
	<td>
		<?php
		echo "<span class='label label-warning' >";
		echo "$ ";
		echo "<span class='montoExtra'>";
		echo $extra ['Monto'];
		echo "</span>";
		echo "</span>";
		if ($admin == 1) {
		echo "  <button type='button' class='close eliminarExtra hidden-print' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
		}
		?>
		</td>


</tr>
<?php
	}
}

echo "</tbody>";
//aqui termina Extras

//aquiparte Resumen honorarios
echo "<thead>";
echo "<tr class='success'><th colspan='2'>Total Horas Mes: <span id='totalHoras' style='padding-left:120px'></span></th></tr>";
echo "<tr class='success' ><th colspan='2'>Valor Honorarios Base: <span style='padding-left:60px'>$ </span><span id='totalHonorarios'></span><span id='totalHonorariosHidden' style='display:none'></span></th></tr>";
echo "<tr><th class='info' colspan='2'><center>Boleta de Honorarios <center></th></tr>";
echo "<tr><th class='warning' colspan='2'>Total Bruto: <span style='padding-left:146px'>$ </span><span id='bruto'></span></th></tr>";
echo "<tr><th class='warning' colspan='2'>10% de retenci&oacute;n: <span style='padding-left:100px'>$ </span><span id='retencion'></span></th></tr>";
echo "<tr><th class='warning' colspan='2'>Total l&iacute;quido honorarios: <span style='padding-left:50px'>$ </span><span id='liquido'></span></th></tr>";
echo "</thead>";
//aqui termina resumen Honorarios
?>

</table>


<div class='alert alert-warning visible-print-block'>
	Enviar Boleta de honorarios a nombre de :<br> TMTECNOMED S.A. <br> RUT:
	76.022.465-0 <br> Direcci&#243n: Valle del Maipo poniente N&ordm 3617.
	Pe&ntildealolen, Stgo.
</div>


<script>
//script que suma las horas realizadas
    var suma = 0;
    $(".HorasRealizadas").each(function(index) {
        suma += parseFloat($(this).text());
    });
    $('#totalHoras').html(suma);
</script>

<script>
//script para sumar la multiplicacion de las horas hechas por su valor hora ( dependiendo de si es semana o sabado)
var contador = 0;
var cuentaHoras = 0;
var cuentaValoresHora = 0;
$(".CentroHoraRealizada").each(function() {
	cuentaHoras = cuentaHoras + 1;
 var horasRealizadas= $(this).text();
 var horas = $(this).parent().parent().find('.HorasRealizadas').text();
 var semanahorarealizada = $(this).parent().parent().find('.semanahorarealizada').text();
 //alert(horas);
 //alert(horasRealizadas);
 $(".nombreEmpresa").each(function() {
	 var tr = $(this).parent().parent().parent();
	var centroValorHora = $(this).text();
    var valorhora= $(this).parent().parent().parent().find('.Valor').html();
    var semanavalorhora= $(this).parent().parent().parent().find('.semanavalorhora').text();
   // alert(valorhora);
	//alert(centroValorHora);
if(horasRealizadas == centroValorHora && semanahorarealizada == semanavalorhora)
{
	cuentaValoresHora = cuentaValoresHora +1;
	tr.show();
	tr.removeClass("hidden-print");
	contador= parseFloat(contador + parseFloat(horas*valorhora));
}


 });
 if(cuentaHoras > cuentaValoresHora){
	 $('#errores').html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Error!</strong> Falta agregar Valores Hora para calcular Honorario.</div>");
	 }
});
// honorarios hidden totalHonorariosHidden
var contadorhonorario = parseFloat(contador).toFixed();
$('#totalHonorariosHidden').html(contadorhonorario);
//honorarios displayed
$('#totalHonorarios').html(contadorhonorario.toLocaleString('de-DE'));
</script>
<script>
//script para sumar los Extras
var suma = parseFloat($('#totalHonorariosHidden').text()).toFixed();
$(".montoExtra").each(function(index) {
    suma = parseFloat(suma)+ parseFloat($(this).text());
});
//honorarios hidden totalHonorariosHidden
sumaHonorarios = parseFloat(parseFloat(suma).toFixed());
$('#totalHonorariosHidden').html(suma);
//honorarios displayed
$('#totalHonorarios').html(sumaHonorarios.toLocaleString('de-DE'));
</script>
<script>
//script para calcular los honorarios brutos, retencion y liquido (toLocaleString('de-DE') cambia el formato a separador de miles )
var bruto = parseFloat($('#totalHonorariosHidden').text());
$('#bruto').html(bruto.toLocaleString('de-DE'));
var retenciondecimales = bruto*0.1;
var retencion = parseFloat(parseFloat(retenciondecimales).toFixed());
$('#retencion').html(retencion.toLocaleString('de-DE'));
var liquido = parseFloat(parseFloat(parseFloat(bruto)-parseFloat(retencion)).toFixed());
//var liquidoMiles = Moneda(liquido);
$('#liquido').html(liquido.toLocaleString('de-DE'));
</script>


<script>
//script que a�ade un campo Extra
    $(".btnextra").click(function() {

        var content = "<tr class= 'Extra'><td><input type='text' class= 'Extra form-control' required name='Extra' placeholder='Ingrese Titulo del Extra'></td>";
        content += "<td><input type='text' class='montoExtra form-control' required name='montoExtra' placeholder='Ingrese Monto Total (hora*valor)'>";
        content += "<button class='btn btn-info btnguardarExtra hidden-print'>Guardar</button>";
        content += "<button class='btn btn-danger btncancelarExtra hidden-print'>Cancelar</button>";
        content += "</td></tr>";
        $('#appendExtra').append(content);
        $(".btncancelarExtra").bind('click', function() {
            $(this).parent().parent().remove();
        });
        $(".btnguardarExtra").bind('click', function() {
            $(this).parent().parent().find('.btnguardarExtra').attr("value", "Guardado Exitoso");
            $(this).parent().parent().find('.btnguardarExtra').attr("disabled", "disabled");
            $(this).parent().parent().find('.btnguardarExtra').attr("class", "btn btn-success btnguardarExtra hidden-print");
            $(this).parent().parent().find('.btncancelarExtra').attr("disabled", "disabled");
            var input = $(this).parent().parent().find(".Extra");
            var inputmonto = $(this).parent().parent().find(".montoExtra");
               var year = moment($('#year').val()+'-'+$('#month').val()+'-01').format('YYYY-MM-DD');
               var titulo = input.val();
               var monto = inputmonto.val();
               var row = $(this).parent().parent(); //linea en la que se encuentra
               row.html("<td><span class='tituloExtra'>"+titulo+"</span></td><td><span class='label label-warning' >$ <span class='montoExtra'>"+monto+"</span></span><button type='button' class='close eliminarExtra2 hidden-print' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td>");
                jQuery.ajax({
                method: "POST",
                url: "querys/insertExtra.php",
                data: {
                    "fecha": year,
                    "rutTM": "<?php echo $rut; ?>",
                    "titulo": titulo,
                    "monto": monto
                },
                success: function(response)
                {
                    input.attr("disabled", "disabled");
                    inputmonto.attr("disabled", "disabled");
                }
            });
               sumaMonto(monto);
             //script para eliminar un extra
               $('.eliminarExtra2').click(function(){
               	var titulo = $(this).parent().parent().find('.tituloExtra').text();
               	var aqui = $(this).parent().parent();
               	var monto = $(this).parent().find('.montoExtra').text();
               	 var r = confirm("Esta seguro que quiere eliminar Extra: " + titulo + "?");
                    if (r == true) {

                        jQuery.ajax({
                            method: "POST",
                            url: "querys/eraseExtra.php",
                            data: {
                           	 "rut": "<?php echo $rut; ?>",
                                'titulo': titulo,
                                'monto': monto,
                                'fecha': "<?php echo $mes; ?>"
                            },
                            success: function(response)
                            {
                                aqui.remove();
                                var resta = monto*-1;
                                sumaMonto(resta);
                            }
                        });
                    }
               });
        });


    });

</script>
<script>
//script para eliminar un extra
$('.eliminarExtra').click(function(){
	var titulo = $(this).parent().parent().find('.tituloExtra').text();
	var aqui = $(this).parent().parent();
	var monto = $(this).parent().find('.montoExtra').text();
	 var r = confirm("Esta seguro que quiere eliminar Extra: " + titulo + "?");
     if (r == true) {

         jQuery.ajax({
             method: "POST",
             url: "querys/eraseExtra.php",
             data: {
            	 "rut": "<?php echo $rut; ?>",
                 'titulo': titulo,
                 'monto': monto,
                 'fecha': "<?php echo $mes; ?>"
             },
             success: function(response)
             {
                 aqui.remove();
                 var resta = monto*-1;
                 sumaMonto(resta);
             }
         });
     }
});
</script>

<script>
//script para sumar los montos de los extras en el momento en que se guarden
function sumaMonto(monto){
	var suma = parseFloat($('#totalHonorariosHidden').text()).toFixed();

    suma = parseFloat(parseFloat(suma)+ parseFloat(monto));
//total honorarios hidden
$('#totalHonorariosHidden').html(suma);
//total honorarios displayed
$('#totalHonorarios').html(suma.toLocaleString('de-DE'));
var bruto = parseFloat(parseFloat($('#totalHonorariosHidden').text()).toFixed());
$('#bruto').html(bruto.toLocaleString('de-DE'));
var retenciondecimales = bruto*0.1;
var retencion = parseFloat(parseFloat(retenciondecimales).toFixed());
$('#retencion').html(retencion.toLocaleString('de-DE'));
var liquido = parseFloat(parseFloat(parseFloat(bruto)-parseFloat(retencion)).toFixed());
//var liquidoMiles = Moneda(liquido);
$('#liquido').html(liquido.toLocaleString('de-DE'));
}

</script>
