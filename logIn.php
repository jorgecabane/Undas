<?php
session_start ();
include_once "conexionLocal.php";
//if (isset ( $_SESSION ["fallaste"] )) {
//	echo "<h1>";
//	echo $_SESSION ["fallaste"];
//	echo "</h1>";
//}
?>
<html>
<head>
<!-- css -->
<meta http-equiv="Content-Type" content="text/html" ; charset=utf-8 "/>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link href="css/bootstrap.min.css" rel='stylesheet'>
<style>
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
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
.form-signin input[type="text"] {
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


</head>
<?php
function verificar_login($user, $password, &$result) {
	$rec = mysql_query ( "SELECT * FROM TM WHERE Nombre = '$user' and Password = '$password'" ) or die ( mysql_error () );
	
	$count = 0;
	while ( $row = mysql_fetch_object ( $rec ) ) {
		$count ++;
		$result = $row;
	}
	if ($count == 1) {
		return 1;
	} else {
		return 0;
	}
}

// $tipo = mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'") or die(mysql_error());
// $resultadotipo= mysql_fetch_assoc($tipo);
if (isset ( $_POST ['login'] )) {
	if (verificar_login ( $_POST ['user'], $_POST ['password'], $result ) == 1) {
		$user1 = $_POST ['user'];
		// $query = mysql_query("SELECT usuario FROM usuarios WHERE usuario = '$user'") or die(mysql_error());
		// $row2 = mysql_fetch_assoc($query);
		$_SESSION ["usuario"] = $user1;
		
		$queryoli = "Select idTM from TM where Nombre='$user1'";
		// echo $queryoli;
		$resultado33 = mysql_query ( $queryoli ) or die ( mysql_error () );
		
		if ($resultado33) {
			$resultado34 = mysql_fetch_assoc ( $resultado33 );
			if ($resultado34) {
				$_SESSION ['idusuario'] = $resultado34 ['idTM'];
				// echo $_SESSION['idusuario'];
			}
		} else {
			echo "error con query";
		}
		
		header ( "location:index.php" );
		echo "Has sido logueado correctamente " . $_SESSION ['usuario'] . " ";
	} else {
		echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
	}
}
?>

<style type="text/css">
.error {
	color: red;
	font-weight: bold;
	margin: 10px;
	text-align: center;
}
</style>
<body background="images/bg.gif">
	<div class='container-fluid' style='margin-top:50px;'>
		<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-4 well'>
				<form action="" method="post" class="form-singin">
					<h2 class='form-singin-heading'>Ingreso de Usuarios</h2>
					<label for="user" class="sr-only">Nombre</label> <input id="call"
						name="user" type="text" class='form-control' placeholder='Nombre'>
					<label for='password' class="sr-only">Contrase&ntilde;a</label> <input
						name="password" type="password" class='form-control'
						placeholder='Contrase&ntilde;a'> <input name='login'
						class="btn btn-lg btn-primary btn-block" type="submit"></input>
				</form>
			</div>
			<div class='col-md-4'></div>
		</div>
	</div>
</body>
<script>
$( document ).ready(function() {
 $("#call").focus(); }  
 );
</script>
</html>