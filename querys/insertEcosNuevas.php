<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
		include_once "../conexionLocal.php";
		$idCentro = trim($_POST ['idCentro']);
		$numeroecos = trim($_POST ['ecos']);
		$nombreEcos = $_POST['nombreEcos'];
		$coloresEcos = $_POST['coloresEcos'];

		// insertando n ecos
		for($contador = 0; $contador < $numeroecos; $contador ++) {
		$query2 = "insert into ecos values (null,$idCentro,'$nombreEcos[$contador]','$coloresEcos[$contador]')";
		$resultado = mysql_query ( $query2 );
		}
		if ($resultado) {
			// success
			echo "Ecos agregadas con exito, redireccionando";
		} else {
			// failure
			echo " Error, redireccionando";
		}
?>
								
    </body>
</html>