<?php
include_once "querys/getTM.php"; // aqui ya se incluye la conexion local
include_once "querys/getEcos.php";
include_once "querys/getEventos.php";
// include_once "conexionLocal.php"; // se incluye la conexion local arriba
include_once "include/isAdmin.php";

$result = mysql_query("Select * from Centro");
if ($_SESSION ["usuario"]) {
    if (isAdmin($_SESSION ["idusuario"]) == 1) {
        $admin = 1;
    } else {
        $admin = 0;
    }
}
?>
<head>
    <!-- title and meta -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="Include/jquery-2.1.4.min.js"></script>
    <!--<script src="Include/jquery-ui.js"></script> -->
    <script src="Include/bootstrap.js"></script>
    <script src='calendario/lib/moment.min.js'></script>
    <script src='calendario/lib/jquery.min.js'></script>
    <script src='calendario/lib/jquery-ui.custom.min.js'></script>
    <script src='calendario/fullcalendar.min.js'></script>
    <script src='calendario/lang/es.js'></script>



    <!-- css -->
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href='calendario/fullcalendar.css' rel='stylesheet'/>
    <link href='calendario/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="css/style.css" rel='stylesheet'>

</head>
<body background="images/bg.gif">
    <div class='row' align="left">

        <img src="images/logo.gif" alt="logo" />

    </div>
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse"
                 id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php
                    // si es admin ve esto
                    if ($admin == 1) {
                        ?>
                        <!-- este es un dropdown -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                data-toggle="dropdown" role="button" aria-expanded="false">Horarios
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <li><a
                                            href="calendario.php?idCentro=<?php
                                            echo $row['idCentro'];
                                            echo '&centro=' . $row['Nombre'];
                                            ?>"><?php echo $row['Nombre']; ?></a>
                                        </form></li><?php
                                }
                                ?>
                            </ul></li>
                    <?php } // si es admin ve esto   ?>
                    <!-- aqui termina -->
                    <!-- este es un dropdown -->
                    <?php
                    // si es admin ve esto
                    if ($admin == 1) {
                        ?>
                        <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                data-toggle="dropdown" role="button" aria-expanded="false">Ingreso
                                de Datos <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="agregarTmR.php">Tecnologos Medicos</a></li>
                                <li><a href="agregarEmpresaR.php">Empresa nueva</a></li>
                                <li><a href="agregarCentroNuevoR.php">Centro nuevo</a></li>
                            </ul>
                        </li>
                        <li><a href="empresaGeneral.php">Empresas</a></li>
                    <?php } // si es admin ve esto   ?>

                    <li><a id="perfiles" href="Perfiles.php">Perfiles TM</a></li>
                </ul>
                <!-- aqui termina -->

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="editarClave.php">Editar Clave</a></li>
                    <li><a href="logOff.php"><?php echo $_SESSION['usuario']; ?>  (Cerrar sesión)</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>