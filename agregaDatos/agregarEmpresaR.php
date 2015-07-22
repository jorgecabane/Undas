<?php
session_start();
include "../header.php";
include "../include/verificacionUsuario.php";

?>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body background="../images/bg.gif">
         <div class="container">
      <h2>Agregar Empresa</h2>
      <form role="form" action="../querys/insertEmpresaR.php" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Agrege nombre de la empresa" required>
        </div>          
           <div class="form-group">
          <label for="nombre">Rut</label>
          <input type="number" class="form-control" name="rut" placeholder="Agrege Rut de la empresa" required>
        </div>         
           <div class="form-group">
          <label for="nombre">Giro</label>
          <input type="number" class="form-control" name="giro" placeholder="Agrege Giro de la empresa" required>
        </div>          
           <div class="form-group">
          <label for="nombre">Direccion</label>
          <input type="text" class="form-control" name="direccion" placeholder="Agrege direccion de la empresa" required>
        </div>          
           <div class="form-group">
          <label for="nombre">comuna</label>
          <input type="text" class="form-control" name="comuna" placeholder="Agrege comuna de la empresa" required>
        </div>          
           <div class="form-group">
          <label for="nombre">ciudad</label>
          <input type="text" class="form-control" name="ciudad" placeholder="Agrege ciudad de la empresa" required>
        </div>         
             <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
 
    </body>
</html>
