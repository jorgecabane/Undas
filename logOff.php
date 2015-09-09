<?php
 session_start();
 if (isset($_SESSION['usuario'])) {
    $_SESSION['logueado'] = false;
    unset($_SESSION['usuario']);
    session_destroy();
 }
 header('Location: logIn.php');
 exit;
?>