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
		//insertando centro
		$query = "insert into bugs values (null,'$titulo','$descripcion','$id')";
		$resultado = mysql_query ( $query );
		//obteniendo el id del centro recien insertado
		
		if ($resultado) {
			// success
			echo "bug agregado con exito, redireccionando";
		} else {
			// failure
			echo "bug no se guardo, redireccionando";
		}
?>
								
    </body>
</html>
