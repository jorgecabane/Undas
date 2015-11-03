<?php
session_start();
include_once "../conexionLocal.php";
$idEmpresa = $_POST['idEmpresa'];
$nombreEmpresa = $_POST['nombreEmpresa'];

?>
<div class="row well well-sm">
    <ul class="nav nav-tabs nav-pills" id="myTabs">
        <li class="nav active"><a href="#Atab" data-toggle="tab">Informaci&oacute;n Empresa</a></li>
        <li class="nav"><a href="#Btab" data-toggle="tab">Sus Centros</a></li>

    </ul>


    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="Atab">
            <center><h3>Informaci&oacute;n Empresa</h3></center>
            <?php include_once "informacionEmpresas.php"; ?>
        </div>

        <div class="tab-pane fade" id="Btab">
            <center><h3>Informaci&oacute;n de sus Centros</h3></center>
            <?php include_once "Centros.php"; ?>
        </div>

    </div>
</div>