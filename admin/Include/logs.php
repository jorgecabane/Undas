<?php
include_once dirname(__FILE__) . '/../querys/getLogs.php'; //conexion local
$fechas = getLogsParam(2);
//print_r($fechas);
echo "<center><h3>Logs</h3></center>";
echo "<div class='row'>";
echo "<div class='col-sm-4'><input class='form-control' type='text' id='search' placeholder='Filtro'></div>";
echo "<div class='col-sm-4'><select class='form-control' id='fecha'><option>Todas las fechas</option>";
foreach ($fechas as $data) {
    foreach ($data as $fecha) {
        echo "<option value='$fecha'>$fecha</option>";
    }
}
echo "</select></div>";
echo "<div class='col-sm-4'>Otro filtro</div>";
echo "</div><!-- row -->";
echo "<table class='table table-fixed'>
        <thead>
            <tr>
                <th width='21%'>Horario</th>
                <th width='7%'>Tipo</th>
                <th width='13%'>User</th>
                <th width='17%'>IP</th>
                <th width='43%'>URL</th>
            </tr>
        </thead></table>";
echo '<div style="max-height: 300px; overflow-y: auto;">';
echo "<table class='table table-bordered table-hover table-fixed'><tbody>";
$logs = getLogs();
if ($logs) {
    foreach ($logs as $log) {
        $url = explode('?', $log['url']);
        $vars = explode('&', $url[1]);
        $user = explode('=', $vars[1]);
        $ip = explode('=', $vars[2]);
        echo "<tr class='log'>
                <td>$log[horario]</td>
                <td>$log[tipo]</td>
                <td>$user[1]</td>
                <td>$ip[1]</td>
                <td>$url[0]</td>
              </tr>";
    }
}
echo "  </tbody>
      </table></div>  ";
?>
<script>
    $('#search').keyup(function() {
        $('.log').hide();
        var txt = $('#search').val();
        $('.log').each(function() {
            if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                $(this).show();
            }
        });
    });
    $('#fecha').change(function() {
        $('.log').hide();
        var txt = $('#fecha').val();
        $('.log').each(function() {
            if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                $(this).show();
            }
        });
    });
</script>