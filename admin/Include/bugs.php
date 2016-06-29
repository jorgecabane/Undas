<?php

include_once dirname(dirname(__FILE__)) . '/querys/getBugs.php'; //conexion local
//include_once dirname(dirname(__FILE__)) . '/querys/getTM.php'; //getTM
//include_once dirname(dirname(__FILE__)) . '/querys/getEmpresa.php'; //getEmpresa
echo '<div class="table-responsive">';
echo "<table class='table table-condensed table-bordered table-hover'>
        <thead>
            <tr>
				<th>Close</th>
                <th>Informante</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha</th>
            </tr>
        </thead>";

echo "<tbody>";
$bugs = getBugs('tm');
if ($bugs) {
    foreach ($bugs as $bug) {
        echo "<tr>";
        echo '<td><input type="checkbox" value="' . $bug['id'] . '" class="closebug"></td>';
        echo '<td>'.$bug['Nombre'].' '.$bug['Apellido'].'</td>';
        echo "<td>$bug[Titulo]</td>
                <td>$bug[Descripcion]</td>
                <td>$bug[fecha]</td>
             </tr>";
    }
} // for each de los bugs
$bugs = getBugs('empresa');
if ($bugs) {
    foreach ($bugs as $bug) {
        echo "<tr>";
        echo '<td><input type="checkbox" value="' . $bug['id'] . '" class="closebug"></td>';
        echo '<td>'.$bug['Nombre'].'</td>';
        echo "<td>$bug[Titulo]</td>
                <td>$bug[Descripcion]</td>
                <td>$bug[fecha]</td>
             </tr>";
    }
} // for each de los bugs
echo "</tbody>
      </table></div>";
?>
