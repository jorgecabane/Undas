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
								
								$query = "insert into Centro values (null,$idEmpresa,'$nombre','$siglas')";
								$resultado = mysql_query ( $query );
								
								$querybuscar = "SELECT idCentro FROM Centro WHERE Empresa_idEmpresa=$idEmpresa";
								$resultadobuscar = mysql_query ( $querybuscar );
								
								$idcentro = mysql_fetch_assoc ( $resultadobuscar );
								$valoridcentro = $idcentro ['idCentro'];
								
								for($contador = 1; $contador <= $numeroecos; $contador ++) {
									$query2 = "insert into Ecos values (null,$valoridcentro,$contador)";
									$resultado2 = mysql_query ( $query2 );
								}
								if ($resultado && $resultado2) {
									// success
									echo "Centro agregado con exito, redireccionando";
									?>
									<meta http-equiv="Refresh"
		content="1;url=../agregarCentroNuevoR.php">;
        <?php
								} else {
									// failure
									echo " El nombre o sigla ya existe, redireccionando";
									?>
        
    <meta http-equiv="Refresh"
		content="1;url=../agregarCentroNuevoR.php">;
    <?php
								}
								
								?>
								
    </body>
</html>
