<center><section class="productList">





     
        
    </head>
    <body>
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT * from TM Where Rut=$rut") or die(mysql_error());

if($resultado){

echo "<table id='t01' class='table table-hover table-bordered'>"; 
echo "<thead><tr>";
  echo  "<th>Nombre</th>";
  echo  "<th>Apellido</th>" ;
  echo  "<th>Rut</th>";
  echo  "<th>Mail</th>";
  echo  "<th>Celular</th>";
  echo  "<th>Editar</th>";
  echo  "<th>Eliminar</th></thead><tbody>";
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['Nombre'] . "</td>";
  echo  "<td>" . $row['Apellido'] . "</td>" ;
  echo  "<td>" . $row['Rut'] . "</td>";
  echo  "<td>" . $row['Mail'] . "</td>";
  echo  "<td>" . $row['Celular'] . "</td>";
   
  ?>
            <td>
     <form action="editarGeneral.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
        <input type="submit" value="Editar" class='btn btn-info'/>
     </form>
 </td>
 <td>
     <form action="borrarTm.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
        <input type="submit" value="Eliminar" class='btn btn-danger'/>
     </form>
     </td>
     <?php 
     
  echo  "</tr>" ;
 
  

};
echo "</tbody></table>";
};?>
 </div> 
</form>