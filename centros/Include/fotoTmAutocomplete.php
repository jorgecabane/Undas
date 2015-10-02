<?php

session_start();
include_once "conexionLocal.php";
$rut=$_POST['Rut'];


            $result=mysql_query("Select Nombre, Imagen, Apellido, Mail, Celular from TM Where Rut=$rut");
            $hola=  mysql_fetch_assoc($result);
            $imagen=$hola['Imagen'];
            $nombre=$hola['Nombre'];
            $apellido=$hola['Apellido'];
            $mail=$hola['Mail'];
            $celular=$hola['Celular'];
            
            ?>
<center>
            <img src="fotoPerfil/<?php echo $imagen; ?>" width='50px' height="50px">
            </center>