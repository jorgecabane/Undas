<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
		include_once "../conexionLocal.php";
		if(isset($_POST ['empresa'],$_POST ['nombre'],$_POST ['siglas'],$_POST ['ecos'],$_POST ['nombreEcos'],$_POST ['coloresEcos'])){
		$idEmpresa = trim($_POST ['empresa']);
		$nombre = trim($_POST ['nombre']);
		$siglas = trim($_POST ['siglas']);
		$numeroecos = trim($_POST ['ecos']);
		$nombreEcos = $_POST['nombreEcos'];
		$coloresEcos = $_POST['coloresEcos'];
		//insertando centro
		$query = "insert into centro values (null,$idEmpresa,'$nombre','$siglas')";
		$resultado = mysql_query ( $query );
		//obteniendo el id del centro recien insertado
		$querybuscar = "SELECT idCentro FROM centro WHERE Nombre='$nombre'";
		$resultadobuscar = mysql_query ( $querybuscar );
								
		$idcentro = mysql_fetch_assoc ( $resultadobuscar );
		$valoridcentro = $idcentro ['idCentro'];
		// insertando n ecos
		for($contador = 0; $contador < $numeroecos; $contador ++) {
		$query2 = "insert into ecos values (null,$valoridcentro,'$nombreEcos[$contador]','$coloresEcos[$contador]')";
		$resultado2 = mysql_query ( $query2 );
		}
		if ($resultado && $resultado2) {
			// success
			echo "Centro:$nombre agregado con exito";
		} else {
			// failure
			echo " El nombre:$nombre o sigla:$siglas ya existe, intente otra vez";
		}
		}
		else {
			echo "campo/s vacíos";
		}
?>
								
    </body>
</html>
