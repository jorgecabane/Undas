<?php
include "header.php";
session_start();

?>
<html>
  <head>
   
  
  </head>

  <body background="images/bg.gif">
    <div class="container">
      <h2>Agregar Datos Mensuales</h2>
      <form role="form" action="ingresoDatosMensuales.php" method="POST">
        <div class="form-group">
          <label for="NombreEmpresa">Nombre de la Empresa</label>
          <br>
          <?php
include_once "conexion.php";
  
    $query = "SELECT * from Empresa order by Nombre asc ";

    $resultado = mysql_query($query) or die(mysql_error());
    if ($resultado) {
        echo"<select name='empresa' id='empresa'>";
 echo "<option > Seleccione Empresa </option>";
        while ($row = mysql_fetch_assoc($resultado)) {

            echo "<option value='" . $row['idEmpresa'] . "'>" . $row['Nombre'] . "</option>";
        }
        echo"</select><br>";
        echo "<br>";
      
    }
        ?>
          
          
          
          
          
        </div>
          
       
      
      
        <div class="form-group">
          <label for="NombreEmpresa">Nombre del Centro</label>
          <br>
          <?php
include_once "conexion.php";
  
    $query = "SELECT * from Centro order by Nombre asc ";

    $resultado = mysql_query($query) or die(mysql_error());
    if ($resultado) {
        echo"<select name='centro' id='centro'>";
 echo "<option > Seleccione Centro </option>";
        while ($row = mysql_fetch_assoc($resultado)) {

            echo "<option value='" . $row['idCentro'] . "'>" . $row['Nombre'] . "</option>";
        }
        echo"</select><br>";
        echo "<br>";
      
    }
        ?>
          
          
          
          
          
        </div>
          
          <div class="form-group">
          <label for="Mes">Mes</label>
          <select class="form-control"  name="mes">
  <option value="Seleccione Mes">Seleccione Mes</option>
  <option value="01">Enero</option>
  <option value="02">Febrero</option>
  <option value="03">Marzo</option>
  <option value="04">Abril</option>
  <option value="05">Mayo</option>
  <option value="06">Junio</option>
  <option value="07">Julio</option>
  <option value="08">Agosto</option>
  <option value="09">Septiembre</option>
  <option value="10">Octubre</option>
  <option value="11">Noviembre</option>
  <option value="12">Diciembre</option>
  
</select>
        </div>
          
          <div class="form-group">
          <label for="A&ntilde;o">A&ntilde;o</label>
          <select class="form-control"  name="año">
              <option value="Seleccione A&ntilde;o">Seleccione A&ntilde;o</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  
  
</select>
        </div>

         <div class="form-group">
          <label for="CantidadCupos">Cantidad de cupos disponible</label>
          <input type="number" class="form-control" name="CantidadCupos" placeholder="Numero de cupos">
        </div>                  
                
         <input class='btn btn-success' type='submit' value='Ingresar'>
      </form>
    </div>
 
  </body>
</html>