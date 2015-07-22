<center><section class="productList">





     
        
    </head>
    <body>
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT * from TM Where Rut=$rut") or die(mysql_error());

if($resultado){

echo "<table id='t01'>"; 
echo "<tr >";
  echo  "<td>Nombre</td>";
  echo  "<td>Apellido</td>" ;
  echo  "<td>Rut</td>";
  echo  "<td>Mail</td>";
  echo  "<td>Celular</td>";
  echo  "<td>Contrase&ntilde;a</td>";
  echo  "<td>Editar</td>";
  echo  "<td>Eliminar</td>";
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['Nombre'] . "</td>";
  echo  "<td>" . $row['Apellido'] . "</td>" ;
  echo  "<td>" . $row['Rut'] . "</td>";
  echo  "<td>" . $row['Mail'] . "</td>";
  echo  "<td>" . $row['Celular'] . "</td>";
  echo  "<td>" . $row['Contrase&ntilde;a'] . "</td>";
 
  ?>
            <td>
     <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
        <input type="submit" value="Editar" />
     </form>
 </td>
 <td>
     <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
        <input type="submit" value="Eliminar" />
     </form>
     </td>
     <?php 
     
  echo  "</tr>" ;
 
  

};
echo "</table>";
};?>
 </div> 
</form>