<?php
session_start();
include_once dirname(__FILE__) . "/conexionLocal.php";
// $tipo = mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'") or die(mysql_error());
// $resultadotipo= mysql_fetch_assoc($tipo);
?>
<html>
    <head>
        <!-- css -->
        <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8 "/>
        <script src="Include/jquery-2.1.4.min.js"></script>
        <script src="Include/bootstrap.js"></script>
        <script src="Include/jquery-ui.js"></script>
        <link href="css/bootstrap.min.css" rel='stylesheet'>
        <style>
            body {

                background-color: #eee;
                background: url(images/login.png) no-repeat ;

				padding-top: 40px;
                padding-bottom: 40px;
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
<body>

        <div class='container'>
            <div class='col-md-4 col-md-offset-4 form-group well well-sm'>

                <h2 class='form-singin-heading text'>Inicie sesi&oacute;n</h2>

                <h4>Rut usuario</h4>
                <label for="user" class="sr-only">Rut</label>

                <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                <input id="user" name="user" type="text" class='form-control' placeholder='RUT con puntos y gui&oacute;n'  aria-describedby="basic-addon1" required />
				</div>

                <h4>Contrase&ntilde;a</h4>
                <label for='password' class="sr-only">Contrase&ntilde;a</label>

                <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                <input name="password" id="password" type="password" class='form-control' placeholder='Contrase&ntilde;a' required>
				</div>

                <br>
                <input name='login' class="btn btn-lg btn-primary btn-block btnsubmit" type="submit" value="Ingresar"></input>

                <center><a href="passwords/passwordRecovery.php">(Recuperar clave)</a></center>
            </div>

        </div><!-- login -->
   <div id="respuesta"></div>

    </body>
    <script>
        $(document).ready(function() {
            $(".btnsubmit").click(function() {
                jQuery.ajax({
                    method: "POST",
                    url: "querys/verification.php",
                    async: false,
                    data: {
                        'user': $('#user').val(),
                        'password': $('#password').val()
                    },
                    success: function(response)
                    {
                        if (response == "Tm") {
                            $(location).attr('href', 'index.php');
                        }
                        if (response == "Empresa") {
                            $(location).attr('href', 'centros/index.php');
                        }
                        if (response == 0) {
                            $("#respuesta").html('<div class="alert alert-danger col-md-4 col-md-offset-4">Su usuario o clave no son v&aacute;lidos, intente nuevamente.</div>');
                            $('.input-group').addClass('has-error');
                            $( ".container" ).effect( "shake" );
                        }
                    }
                });
            });
        });
    </script>
</html>
