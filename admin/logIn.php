<?php
session_start();
include_once dirname(dirname(__FILE__)) . "/conexionLocal.php";
?>
<html>
    <head>
        <!-- css -->
        <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8 "/>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href="../css/bootstrap.min.css" rel='stylesheet'>
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
            .admin{
                background: #7db9e8;
                background: -moz-linear-gradient(top,  #7db9e8 0%, #2989d8 50%, #1e5799 100%);
                background: -webkit-linear-gradient(top,  #7db9e8 0%,#2989d8 50%,#1e5799 100%);
                background: linear-gradient(to bottom,  #7db9e8 0%,#2989d8 50%,#1e5799 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 );

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
            <div class='col-md-4 col-md-offset-4 well-sm admin'>
                
                    <h2 class='form-singin-heading'>Inicie sesi&oacute;n</h2>


                    <h4>Rut Admin</h4>
                    <label for="user" class="sr-only">Rut</label> <input id="user" name="user" type="text" class='form-control'
                                                                         placeholder='RUT con puntos y gui&oacute;n' required />
                    <h4>Contrase&ntilde;a</h4>
                    <label for='password' class="sr-only">Contrase&ntilde;a</label>
                    <input id="password" type="password" class='form-control' placeholder='Contrase&ntilde;a' required>
                    <br>
                    <input name='login' class="btn btn-lg btn-primary btn-block btnsubmit" type="submit"></input>
             

            </div>

        </div>


    </body>
    <script>
        $(document).ready(function() {
            $("#user").focus();
        });
    </script>
    
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
             			if(response == 1){
                      $(location).attr('href', 'index.php');
             			}
                        if (response == 0) {
                            $("#respuesta").html('<div class="error">Su usuario o clave no son v&aacute;lidos, intente nuevamente.</div>');
                        }
                    }
                });
            });
        });
    </script>
</html>
