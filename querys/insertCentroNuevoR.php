<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
        <?php
								include_once "../conexionLocal.php";
								$idEmpresa = $_POST ['empresa'];
								$nombre = $_POST ['nombre'];
								$siglas = $_POST ['siglas'];
								$numeroecos = $_POST ['ecos'];
								
								
								//insertando centro
								$query = "insert into Centro values (null,$idEmpresa,'$nombre','$siglas')";
								$resultado = mysql_query ( $query );
								
								//obteniendo el id del centro recien insertado
								$querybuscar = "SELECT idCentro FROM Centro WHERE Nombre='$nombre'";
								$resultadobuscar = mysql_query ( $querybuscar );
								
								$idcentro = mysql_fetch_assoc ( $resultadobuscar );
								$valoridcentro = $idcentro ['idCentro'];
								
								// insertando n ecos
								
								for($contador = 1; $contador <= $numeroecos; $contador ++) {
									$query2 = "insert into Ecos values (null,$valoridcentro,'Eco". $contador ."',0)";
									$resultado2 = mysql_query ( $query2 );
								}
								if ($resultado && $resultado2) {
									// success
									echo "Centro agregado con exito, redireccionando";
									
								} else {
									// failure
									echo " El nombre o sigla ya existe, redireccionando";
									
								}
								
								?>
								
    </body>
</html>
