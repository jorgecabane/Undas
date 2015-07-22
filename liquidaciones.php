<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "header.php";
include "include/verificacionUsuario.php";

?>
<html>
    <head>
        <title>Liquidaciones</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
 <div align="center">      
	  <h3>seleccione persona</h3>
     
	 <form action="action_page.php" method="POST">
        <select>
            <option value="juan_perez">juan perez</option>
            <option value="jaime_escobar">jaime escobar</option>
            <option value="jorge_soto">jorge soto</option>
            <option value="jose_cabane">jose cabane</option>
        </select>
         <br>
		 <br>	
         Horas semana SONORAD:<input type="number" name="sonorad" value="Hrs."><br>
         Horas semana POLICENTER:<input type="number" name="policenter" value="Hrs."><br>
         Horas semana IMAMED:<input type="number" name="imamed" value="Hrs."><br>
         Horas SABADO AM:<input type="number" name="sbdoam" value="Hrs."><br>
         Horas SABADO PM:<input type="number" name="sbdopm" value="Hrs."><br>
         Total horas mes:<br> 
         Valor honorarios base:<input type="number" name="honorariosbase" value="clp"><br>
          Valor bono produccion mensual:<input type="number" name="bonoproduccion" value="clp"><br>
           Valor bono pasantia alumnos:<input type="number" name="bonopasantia" value="clp"><br>
           
                <h3>Boletas de Honorarios </h3>
          
           total bruto<br>
           10%retencion<br>
           Total loquido honorarios<br>
             
                <h3>INFORMACION </h3>
           
           <input type="submit" value="submit">
		   </div>
     </form>
    </body>
</html>
