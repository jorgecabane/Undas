<?php

/*
 *
 *
 */
include_once dirname(__FILE__) . '/../querys/getPrestaciones.php'; // archivo de conexion local

$prestaciones = getPrestacionesWidget($_POST['idPrestacion'], $_POST['idEmpresa']);
if ($prestaciones) {
    echo '<center>';
    foreach($prestaciones as $tm){
        echo $tm['Nombre'].'<br>';
    }
    echo '</center>';
}else{
    echo "<center><div class='alert alert-warning alert-sm'>No hay TM asignado</div></center>";
}
?>