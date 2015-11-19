<?php
session_start ();
 $_SESSION ['idusuario'] = trim($_GET['id']);
 $_SESSION ["usuario"] = trim($_GET['nombre']);
 
 header('Location: ../index.php');
 exit;
 
?>