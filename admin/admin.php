<?php
session_start();
 $_SESSION["context"] = "super";
 header('Location: ../index.php');
 exit;
 
?>