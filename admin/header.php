<?php
include_once dirname(dirname(__FILE__)) . "/Include/isAdmin.php";

if ($_SESSION ["usuario"]) {
    if (isAdmin($_SESSION ["idusuario"],$_SESSION ["context"]) == 1) {
        $admin = 1;
    } else {
        $admin = 0;
    }
} else {
    //print_r($_SESSION);
    //si no hay sesion se envi al login
    header('Location:logIn.php');
}
?>
<head>
    <!-- title and meta -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TMTECNOMED APP</title>

    <script src="../Include/jquery-2.1.4.min.js"></script>
    <script src="../Include/bootstrap.js"></script>
    <script src="../Include/jquery-ui.js"></script>
    <script src='../calendario/lib/moment.min.js'></script>
    <script src='../calendario/lib/jquery-ui.custom.min.js'></script>
    <script src='../calendario/fullcalendar.min.js'></script>
    <script src='../calendario/lang/es.js'></script>
    <script src='../chart-master/Chart.js'></script>

    <!-- favico-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- css -->

    <link href='css/jquery-ui.css' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>

</head>
<body background="images/bg.gif">
    <div class='row' align="left">
        <img src="images/logo.gif" alt="logo" />
    </div>
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">M&eacute;todos de Ingreso Super Admin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse"
                 id="bs-example-navbar-collapse-1">


                </ul>
                <!-- aqui termina -->

                <ul class="nav navbar-nav navbar-right">
                <li><a href="editarClave.php">Editar Clave</a></li>
                <li><button onClick="window.location.href = '../logOff.php'" class="btn btn-danger navbar-btn"><strong class=""><?php echo $_SESSION['usuario']; ?></strong> (Cerrar sesión)</button></li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>