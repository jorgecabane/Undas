<?php
session_start ();
 $_SESSION ['idusuario'] = $_GET['id'];
 $_SESSION ["usuario"] = $_GET['nombre'];
 
 header('Location: ../index.php');
 exit;
?>