<!--  !OOJOOO!REVISAR HEADER! COLAPSA CON <script src="js/bootstrap.min.js"></script> -->
<?php
session_start();
include "header.php";
include "include/verificacionUsuario.php";

?>
<html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body background="images/bg.gif">
    <div class="container">
      <h2>Editar Clave</h2>
      <form role="form" action="updateClaveTm.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="Nombre">Ingrese Clave Antigua</label>
          <input type="password" class="form-control" name="claveantigua"  placeholder="Ingrese clave antigua" required>
        </div>
          <div class="form-group">
          <label for="contraseņa">Nueva Clave</label>
          <input type="password"  class="form-control" name="clavenueva" placeholder="Ingrese nueva clave" required>
        </div>
          <div class="form-group">
          <label for="Repetircontraseņa">Repetir Clave Nueva</label>
          <input type="password"  class="form-control" name="repetirclave" placeholder="Reescribir clave" required>
        </div>
          <br>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
      

  </body>
</html>
