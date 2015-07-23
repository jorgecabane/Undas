<?php


include "../conexionLocal.php";


$rut=$_POST['Rut'];

?>
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