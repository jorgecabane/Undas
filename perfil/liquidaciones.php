<?php
include_once "../Include/isAdmin.php";
include_once "../Include/meses.php";
include_once "../querys/getHoras.php";
include_once "../querys/getValorHora.php";
include_once "../querys/getExtras.php";

$mes = $_POST['mes'];
$rut = $_POST['rut'];

$Horas = getHoras($rut, $mes);
echo "<table id='t01' class='table table-hover table-bordered table-condensed table-responsive' style='max-width:80%; white-space: nowrap'>";
echo "<thead><tr class='bg-primary' colspan='2'>";
echo "<th>Fecha: ";
echo "<span id='mes'>".Mes($Horas[0]['Mes'])."</span>";
echo " " ;
echo "<span id='year'>".$Horas[0]['Year']."</span>";
echo " </th>";
echo "</thead></tr>";

echo "<thead><tr class='bg-primary' colspan='2'>";
echo "<th>TM: ";
echo $Horas[0]['TMNombre'];
echo " " . $Horas[0]['TMApellido'];
echo " </th>";
echo "</thead></tr>";

echo "<thead><tr class='bg-info'>";
echo "<th>Empresa</th>";
echo "<th>Horas Realizadas</th>";
echo "</thead></tr><tbody>";
if($Horas){
foreach ($Horas as $informacion) {
    ?>


    <tr>
        <td>

            <span class="CentroHoraRealizada"><?php echo $informacion['NombreEmpresa']; ?></span>
            <span class="semanahorarealizada"><?php if($informacion['Semana']==7)
            {
            	echo "Sabado";
            }
            else{
            	echo "Semana";
            }
            	?></span>

        </td>
        <td>
            <span class='label label-info' ><span  class="HorasRealizadas"><?php echo number_format($informacion['Horas'], 2); ?></span> horas </span>

        </td>
    </tr>
    <?php
}}
else 
{
	echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Tm no tiene Horas realizadas asociadas.
</div>';
}

?>
</tbody>

<?php
echo "<thead><tr class='bg-info'>";
echo "<th>Empresa</th>";
echo "<th>Valor Hora</th>";
echo "</thead></tr><tbody>";
$ValorHoras = getValorHora($rut);
if($ValorHoras){
	

foreach ($ValorHoras as $valores) {
    ?>
    <tr class="hidden-print" style="display:none">

        <td>

            <span class="CentroValorHora"><?php
            echo "<span class='nombreEmpresa' >";
                echo $valores['Empresa'];
                echo "</span>";
                echo " ";
                echo "<span class='semanavalorhora'>";
                if ($valores['Semana'] == 1) {
                    echo 'Semana';
                } else {
                    echo 'Sabado';
                }
                echo "</span>";
                ?> </span>

        </td>

        <td>

            <span  class='label label-success'>$ <span class='Valor' ><?php echo $valores['Valor']; ?></span></span>

        </td>


    </tr>

    <?php
}}
else 
{
	echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> TM no tiene Valores Hora asociados.
</div>';
}
if(count($Horas) != count($ValorHoras)){
	echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Falta agregar Valores Hora para calcular Honorario.
</div>';
	
}
echo "<thead ><tr colspan='2' class='bg-info'>";
echo "<th>Extras <input type='submit' value='Agregar Extra' class='btn btn-info btnextra pull-right hidden-print' /></th>";
echo "<th>Monto Total</th>";
echo "</thead >";
echo "<tbody id='appendExtra'>";
$extras = getExtras($rut, $mes);
if($extras){
	foreach ($extras as $extra) {
		?>
		<tr>
		<td>
		<?php echo $extra['Titulo'];?>
		</td>
		<td>
		<?php echo $extra['Monto'];?>
		</td>
		
		
		</tr>
		<?php 
	}
	
}

echo "</tbody>";

?>
</tbody>
<?php
echo "<thead><tr class='bg-success' >";
echo "<th>Valor Honorarios Base: $ <span id='totalHonorarios'></span></th>";
echo "<th>Total Horas Mes: <span id='totalHoras'></span></th>";
echo "</tr>";
echo "<tr><th class='bg-info' colspan='2'><center>Boleta de Honorarios <center></th></tr>";
echo "<tr><th class='bg-warning' colspan='2'>Total Bruto: $ <span id='bruto'></span></th></tr>";
echo "<tr><th class='bg-warning' colspan='2'>10% de retencion: $ <span id='retencion'></span></th></tr>";
echo "<tr><th class='bg-warning' colspan='2'>Total liquido honorarios: $ <span id='liquido'></span></th></tr>";
echo "</thead>";
?>

</table>
 <div class='alert alert-warning visible-print-block'>Enviar Boleta de honorarios a nombre de :<br>
 TMTECNOMED S.A. <br>
 RUT: 76.022.465-0 <br>
 Direcci&#243n: Valle del Maipo poniente N&ordm 3617. Pe&ntildealolen, Stgo. 
 </div>

<script>
    var suma = 0;
    $(".HorasRealizadas").each(function(index) {
        suma += parseFloat($(this).text());
    });
    $('#totalHoras').html(suma);
</script>

<script>
var contador = 0;
$(".CentroHoraRealizada").each(function() {
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
	tr.show();
	tr.removeClass("hidden-print");
	contador= (contador + parseFloat(horas*valorhora));
}
	
 });
});
$('#totalHonorarios').html(contador);
</script>

<script>
var bruto = $('#totalHonorarios').text();
$('#bruto').html(bruto);
var retencion = bruto*0.1;
$('#retencion').html(retencion);
var liquido = parseFloat(bruto)+parseFloat(retencion);
$('#liquido').html(liquido);
</script>


<script>

    $(".btnextra").click(function() {
       
        var content = "<tr class= 'Extra'><td><input type='text' class= 'Extra form-control' required name='Extra'></td>";
        content += "<td><input type='text' class='montoExtra form-control' required name='montoExtra'>";
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
            $(this).parent().parent().find('.btnguardarExtra').attr("class", "btn btn-success btnguardarExtra");
            $(this).parent().parent().find('.btncancelarExtra').attr("disabled", "disabled");
            var input = $(this).parent().parent().find(".Extra");
            var inputmonto = $(this).parent().parent().find(".montoExtra");
               var year = moment($('#start').val()+'-01').format('YYYY-MM-DD');
               var titulo = input.val();
               var monto = inputmonto.val();
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
        });

  
    });

</script>