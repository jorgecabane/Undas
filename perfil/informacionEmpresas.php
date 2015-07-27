<?php include_once dirname(__FILE__)."/../conexionLocal.php";
		?>
<center><section class="productList">





     
        
    </head>
    <body>
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT * from Empresa") or die(mysql_error());

if($resultado){

echo "<table id='t01' class='table table-hover table-bordered'>"; 
echo "<thead><tr>";
  echo  "<th>Nombre</th>";
  echo  "<th>Rut</th>";
  echo  "<th>Giro</th>" ;
  echo  "<th>Direccion</th>";
  echo  "<th>Comuna</th>";
  echo  "<th>Ciudad</th>";
  echo  "<th>Editar Empresa</th>";
  echo  "<th>Editar Centros</th>";
  echo  "<th>Eliminar</th></thead><tbody>";
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['Nombre'] . "</td>";
  echo  "<td>" . $row['Rut'] . "</td>" ;
  echo  "<td>" . $row['Giro'] . "</td>";
  echo  "<td>" . $row['Direccion'] . "</td>";
  echo  "<td>" . $row['Comuna'] . "</td>";
  echo  "<td>" . $row['Ciudad'] . "</td>";
   
  ?>
            <td>
     <form action="editarGeneral.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
        <input type="submit" value="Editar Empresa" class='btn btn-info'/>
     </form>
 </td>
  <td>
     <form action="editarGeneral.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
        <input type="submit" value="Editar Centros" class='btn btn-info'/>
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