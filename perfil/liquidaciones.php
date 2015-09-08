<div align="center">
    <?php
    include_once "../include/isAdmin.php";
    include_once "../include/meses.php";
    include_once "../querys/getHoras.php";
    include_once "../querys/getValorHora.php";
    if ($_SESSION ["usuario"]) {
        if (isAdmin($_SESSION ["idusuario"]) == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }
    }
    $mes = 9;

    $Horas = getHoras($rut, $mes);
    echo "<table id='t01' class='table table-hover table-bordered'>";
    echo "<thead><tr class='bg-primary'>";
    echo "<th>Fecha: ";
    echo Mes($Horas[0]['Mes']);
    echo " " . $Horas[0]['Year'];
    echo " </th>";
    echo "</thead></tr>";

    echo "<thead><tr class='bg-primary'>";
    echo "<th>TM: ";
    echo $Horas[0]['TMNombre'];
    echo " " . $Horas[0]['TMApellido'];
    echo " </th>";
    echo "</thead></tr>";

    echo "<thead><tr class='bg-info'>";
    echo "<th>Centro</th>";
    echo "<th>Horas Realizadas</th>";
    echo "</thead></tr><tbody>";

    foreach ($Horas as $informacion) {
        ?>


        <tr>
            <td>

                <span class="CentroHoraRealizada"><?php echo $informacion['NombreCentro']; ?> </span>

            </td>
            <td>
                <span class='label label-info' ><span  class="HorasRealizadas"><?php echo number_format($informacion['Horas'], 2); ?> </span> horas </span>

            </td>
        </tr>
        <?php
    }
    ?>
</tbody>

<?php
echo "<thead><tr class='bg-info'>";
echo "<th>Centro</th>";
echo "<th>Valor Hora</th>";
echo "</thead></tr><tbody>";
$ValorHoras = getValorHora($rut);
foreach ($ValorHoras as $valores) {
    ?>
    <tr>

        <td>

            <span class="CentroValorHora"><?php
    echo $valores['Centro'];
    echo " ";
    if($valores['Semana']==1)
    {
        echo 'Semana';
    }
    else
    {
        echo 'Sabado';
    }
    ?> </span>

        </td>

        <td>

            <span  class='label label-success'>$ <span class='ValoHora' ><?php echo $valores['Valor']; ?></span></span>

        </td>


    </tr>

    <?php
}
?>
</tbody>
<?php
echo "<thead><tr class='bg-success'>";
echo "<th>Valor Honorarios Base: <span id='totalHonorarios'></span></th><th>Total Horas Mes: <span id='totalHoras'></span></th>";
echo "</thead></tr><tbody>";
?>
</table>


<script>
var suma =0 ;
$( ".HorasRealizadas" ).each(function( index ) {
	suma += parseFloat( $(this).text());
});
$('#totalHoras').html(suma);
</script>