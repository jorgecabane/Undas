<?php
include_once('getTM.php'); //funcion getTM
$tms = getTM();

echo '<ul class="nav nav-pills nav-stacked">';

foreach ($tms as $tm) {
    echo '<li class="fc-event fc" rut="' . $tm['Rut'] . '"><span class="glyphicon glyphicon-circle-arrow-right pull-right"></span><center class="nombreevento">' . $tm['Nombre'] . ' ' . $tm['Apellido'] . '</center></li>';
}
echo '</ul>';
?>