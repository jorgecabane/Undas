<?php
 session_start();
 if (isset($_SESSION['usuario'])) {
    $_SESSION['logueado'] = false;
    unset($_SESSION['usuario']);
    session_destroy();
 }
 if(isset($_SESSION['super'])){
 	header('Location: ../admin/logIn.php');
 }
 else{
 	header('Location: ../logIn.php');
 }
  exit;
?>
