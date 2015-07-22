
<?php
         include_once "../conexionLocal.php";
        
         $rec = mysql_query("SELECT * FROM TM ") or die(mysql_error());
         
         $count = 0;
         while ($row = mysql_fetch_assoc($rec)) {
         	echo $row["Nombre"];
         	echo " ";
         	echo $row["Apellido"];
         	
         	echo "<br>";
         }
         
         ?>