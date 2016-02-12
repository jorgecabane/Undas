<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-xs-10 col-xs-offset-1 well well-sm">
            <div class="panel panel-info">
                <?php
                if (isset($_GET['idEmpresa'])) {
                    $datosEmpresa = getCentrosGroup($_GET['idEmpresa']);
                    $datosEmpresa = $datosEmpresa[0];
                    //print_r($datosEmpresa);
                    echo "<div class='panel-heading'><center><h1 class='panel-title'><strong>AGENDAS " . $datosEmpresa['Nombre'] . "</strong></h1></center></div>";
                    echo "<div class='panel-body'>";
                    echo "<div class='col-xs-6 col-xs-offset-3'>";
                    foreach ($datosEmpresa['centros'] as $dato) {
                        echo "<a href='informacionHorario.php?idCentro=" . $dato['idCentro'] . "&centro=" . $dato['Nombre'] . " (" . $dato['Siglas'] . ")' class='btn btn-lg btn-primary btn-block'>" . $dato['Nombre'] . "</a>";
                        //print_r($dato);
                    }//para cada centro
                    echo "</div></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>