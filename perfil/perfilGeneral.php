<?php


include "../conexionLocal.php";


$rut=$_POST['Rut'];

?>
<html>
    <head>
    <style>
table {
    width:100%;
}
table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 7px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th	{
    background-color: black;
    color: white;
}
</style>
           <link rel="stylesheet" href="/../css/style.css">
    </head>           
      <div align="center">
       <h3><center>Informacion Trabajador</center></h3></div></div>
<br>
       <center><div>

           
       <?php
            include "informacionTm.php";
                    ?>
                    </table> 
                   
      </div>
      
    
      
      <div align="center">
       <center><h3>Cobros por Centro</h3></center>
       <br>
       
<?php

include "informacionCobro.php";
?>

       
    </div>
<div align="center">
       <center><h3>Horario TM</h3></center>
      <br>




    </div>
</html>