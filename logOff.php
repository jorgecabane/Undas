<?php
 session_start();
 if (isset($_SESSION['usuario'])) {
    $_SESSION['logueado'] = false;
    unset($_SESSION['usuario']);
    session_destroy();
 }
 if(isset($_SESSION['super'])){
 	session_destroy();
 	header('Location: admin/logIn.php');
 }
 else{
 	session_destroy();
 	header('Location: logIn.php');
 }
  exit;
?>
