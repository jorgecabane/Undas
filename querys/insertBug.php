<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
		include_once "../conexionLocal.php";
		$id = trim($_POST ['id']);
		$titulo = trim($_POST ['titulo']);
		$descripcion = trim($_POST ['descripcion']);
		$date = $_POST ['fecha'];
		//insertando bug
		$query = "insert into bugs values (NULL,'$titulo','$descripcion','$id','$date',NULL,0)";
		$resultado = mysql_query ( $query );
		
		if ($resultado) {
			// success
			echo "Bug agregado correctamente. Lo solucionaremos prontamente.";
		} else {
			// failure
			echo "bug NO se guardo correctamente, intente nuevamente.";
		}
?>
								
    </body>
</html>
