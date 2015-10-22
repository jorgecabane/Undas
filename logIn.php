<?php
session_start();
include_once dirname(__FILE__) . "/conexionLocal.php";
include_once dirname(__FILE__) . "/querys/verification.php";
include_once dirname(__FILE__) . "/querys/insertLog.php";
// $tipo = mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'") or die(mysql_error());
// $resultadotipo= mysql_fetch_assoc($tipo);
if (isset($_POST ['login'])) {
    if (verificar_login($_POST ['user'], $_POST ['password'])) {
        insertLog('login', dirname(__FILE__).'&IP='.$_SERVER['REMOTE_ADDR']);//inserta un log de la ip y donde se metio!
        $user1 = $_POST ['user'];
        // $query = mysql_query("SELECT usuario FROM usuarios WHERE usuario = '$user'") or die(mysql_error());
        // $row2 = mysql_fetch_assoc($query);


        $queryoli = "Select idTM, Nombre, Centro from tm where Rut='$user1'";
        // echo $queryoli;
        $resultado33 = mysql_query($queryoli) or die(mysql_error());

        if ($resultado33) {
            $resultado34 = mysql_fetch_assoc($resultado33);
            if ($resultado34) {
                $_SESSION ['idusuario'] = $resultado34 ['idTM'];
                $_SESSION ["usuario"] = $resultado34 ['Nombre'];
                // echo $_SESSION['idusuario'];
            }
        } else {
            echo "error con query";
        }
        if ($resultado34 ['Centro'] == 1) {
            //log in de centro
            header("location:centros/index.php");
        } else {
            //log in de persona normal
            header("location:index.php");
        }

        echo "Has sido logueado correctamente " . $_SESSION ['usuario'] . " ";
    } else {
        echo '<div class="error">Su usuario o clave no son v&aacute;lidos, intente nuevamente.</div>';
    }
}
?>
<html>
    <head>
        <!-- css -->
        <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8 "/>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href="css/bootstrap.min.css" rel='stylesheet'>
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }

            .form-signin {
                max-width: 100px;
                padding: 15px;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>


    </head>
    <style type="text/css">
        .error {
            color: red;
            font-weight: bold;
            margin: 10px;
            text-align: center;
        }
    </style>
    <body background="images/bg.gif">
        <div class='container'>
            <div class='col-md-4 col-md-offset-4'>
                <form action="" method="post" class="form-singin">
                    <h2 class='form-singin-heading'>Inicie sesi&oacute;n</h2>


                    <h4>Rut usuario</h4>
                    <label for="user" class="sr-only">Rut</label> <input id="call" name="user" type="text" class='form-control'
                                                                         placeholder='RUT con puntos y gui&oacute;n' required />
                    <h4>Contrase&ntilde;a</h4>
                    <label for='password' class="sr-only">Contrase&ntilde;a</label>
                    <input name="password" type="password" class='form-control' placeholder='Contrase&ntilde;a' required>
                    <br>
                    <input name='login' class="btn btn-lg btn-primary btn-block" type="submit"></input>
                </form>
                <center><a href="passwords/passwordRecovery.php">(Recuperar clave)</a></center>
            </div>

        </div>


    </body>
    <script>
        $(document).ready(function() {
            $("#call").focus();
        });
    </script>
</html>
