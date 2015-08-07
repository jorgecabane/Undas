<?php
include_once('getTM.php'); //funcion getTM
$tms = getTM();

echo '<ul class="nav nav-pills nav-stacked">';

foreach ($tms as $tm) {
    echo '<li class="active fc-event" rut="' . $tm['Rut'] . '"><a href="#">' . $tm['Nombre'] . ' ' . $tm['Apellido'] . '</a></li>';
}
echo '</ul>';
?>