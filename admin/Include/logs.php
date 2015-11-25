<?php
include_once dirname(__FILE__) . '/../querys/getLogs.php';//conexion local
echo "<center><h3>Logs</h3></center>";
echo "<table class='table table-condensed table-bordered table-hover'>
        <thead>
            <tr>
                <th>Horario</th>
                <th>Tipo</th>
                <th>User</th>
                <th>IP</th>
                <th>URL</th>
            </tr>
        </thead>";
echo "<tbody>";
$logs = getLogs();
if ($logs) {
    foreach($logs as $log){
        $url = explode('?',$log['url']);
        $vars = explode('&',$url[1]);
        $user = explode('=',$vars[1]);
        $ip = explode('=',$vars[2]);
        echo "<tr>
                <td>$log[horario]</td>
                <td>$log[tipo]</td>
                <td>$user[1]</td>
                <td>$ip[1]</td>
                <td>$url[0]</td>
              </tr>";
    }
}
echo "  </tbody>
      </table>  ";
?>
