<?php

include_once "conexion.php";
//$rut=$_POST['rut'];
$rut=123;
?>

            <?php
            $result=mysql_query("Select Nombre, Imagen, Apellido, Mail, Celular from TM Where Rut=$rut");
            $hola=  mysql_fetch_assoc($result);
            $imagen=$hola['Imagen'];
            $nombre=$hola['Nombre'];
            $apellido=$hola['Apellido'];
            $mail=$hola['Mail'];
            $celular=$hola['Celular'];
            
            echo json_encode($hola);
            

            ?>
           
       
               