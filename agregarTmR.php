<!--  !OOJOOO!REVISAR HEADER! COLAPSA CON <script src="js/bootstrap.min.js"></script> -->
<?php
session_start ();
include "header.php";
include "include/verificacionUsuario.php";

?>
	<div class="container">
		<h2>Agregar Personal</h2>
		<form role="form" action="querys/insertTmR.php" method="POST"
			enctype="multipart/form-data">
			<div class="form-group">
				<label for="Nombre">Nombre</label> <input type="text"
					class="form-control" name="nombre" placeholder="Agrege nombre"
					required>
			</div>
			<div class="form-group">
				<label for="Apellido">Apellido</label> <input type="text"
					class="form-control" name="apellido" placeholder="Agrege apellido"
					required>
			</div>
			<div class="form-group">
				<label for="RUT">RUT</label> <input type="number"
					class="form-control" name="rut" placeholder="Agrege RUT" required>
			</div>
			<div class="form-group">
				<label for="Mail">Mail</label> <input type="text"
					class="form-control" name="mail" placeholder="Agrege Mail" required>
			</div>
			<div class="form-group">
				<label for="Celular">Celular</label> <input type="number"
					class="form-control" name="celular" placeholder="Agrege Celular"
					required>
			</div>
			<div class="form-group">
				<label for="contrase�a">Contraseña</label> <input type="password"
					class="form-control" name="contrasena"
					placeholder="Elegir Contraseña" required>
			</div>
			<div class="form-group">
				<label for="Repetircontrase�a">Repetir Contraseña</label> <input
					type="password" class="form-control" name="repetircontrasena"
					placeholder="Reescribir Contraseña" required>
			</div>
			<br>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>


</body>
</html>
