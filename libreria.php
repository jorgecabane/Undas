<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
include_once dirname(__FILE__) . "/Include/verificacionUsuario.php";
?>

<div  class="row">
<center>
<div id="books">

</div>
</center>
</div>

<script>
$("#books").slideDown('slow').load("books/jquery.html");
</script>