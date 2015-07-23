<?php
session_start ();
include "header.php";
include "include/verificacionUsuario.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body background="images/bg.gif">
	<div class="container">
		<h2>Agregar Centro Nuevo</h2>
		<form action='querys/insertCentroNuevoR.php' method='POST'>
			<div class="form-group">
				<label for="nombre">Nombre</label> <input type="text"
					class="form-control" name="nombre" placeholder="Agrege nombre"
					required>
			</div>
			<div class="form-group">
				<label for="siglas">Siglas</label> <input type="text"
					class="form-control" name="siglas" placeholder="Agrege siglas"
					required>
			</div>
			<div class="form-group">
				<label for="siglas">Numero de ecos</label> <input type="number"
					class="form-control" name="ecos"
					placeholder="Agrege numero de ecos" required>
			</div>
			<label>Empresa a la que pertenece</label> <br>
         
          <?php
										include_once "conexionLocal.php";
										
										$query = "SELECT * from Empresa order by Nombre asc ";
										
										$resultado = mysql_query ( $query ) or die ( mysql_error () );
										if ($resultado) {
											echo "<select required name='empresa' id='empresa' >";
											echo "<option value=''> Seleccione Empresa </option>";
											while ( $row = mysql_fetch_assoc ( $resultado ) ) {
												
												echo "<option value='" . $row ['idEmpresa'] . "'>" . $row ['Nombre'] . "</option>";
											}
											echo "</select><br>";
											echo "<br>";
											echo "<input class='btn btn-success' type='submit' value='Agregar'>";
											
											echo "</form>";
										}
										?>
    



</body>
</html>
