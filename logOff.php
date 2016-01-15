<?php
 session_start();
 if (isset($_SESSION['usuario'])) {
    $_SESSION['logueado'] = false;
 
    if(isset($_SESSION['super'])){
    	session_destroy();
    	header('Location: admin/logIn.php');
    }
    else{
    	header('Location: logIn.php');
    	session_destroy();
    }
 }

 else{
 	session_destroy();
 	header('Location: logIn.php');
 }
  exit;
?>
