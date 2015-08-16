<?php
session_start ();
//include_once "../conexionLocal.php";
?>
<html>
<head>
<!-- css -->
<meta http-equiv="Content-Type" content="text/html" ; charset=utf-8 "/>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link href="../css/bootstrap.min.css" rel='stylesheet'>
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 100px;
  padding: 15px;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<style type="text/css">
.error {
	color: red;
	font-weight: bold;
	margin: 10px;
	text-align: center;
}
</style>
<body background="../images/bg.gif">
	<div class='container'>
		<div class='col-md-4 col-md-offset-4'>
		<form action="enviarPassword.php" method="post" class="form-singin">
				<h2 class='form-singin-heading'>Recuperaci&oacute;n de clave</h2>
				
				
				<h4>Ingrese el mail de la cuenta</h4>
				<label for="email" class="sr-only" >Email</label> <input id="call" name="email" type="text" class='form-control' placeholder='Email' required>
				<h4>Ingrese su rut</h4>
				<label for='rut' class="sr-only">Rut</label> 
				<input name="rut" type="number" class='form-control' placeholder='Rut' required>
			    <br>
			    <input name='recover' class="btn btn-lg btn-primary btn-block" type="submit"></input>
			</form>
			<form action="../logIn.php" method="post" class="form-singin">
			    <input name='recover' class="btn btn-lg btn-danger btn-block" type="submit" value="Cancelar"></input>
			    </form>
		</div>
		
		
			
		
	</div>
	
	
</body>
<script>
$( document ).ready(function() {
 $("#call").focus(); }  
 );
</script>
</html>