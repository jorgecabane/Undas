<?php include_once dirname(__FILE__)."/../conexionLocal.php";
		?>
     
  
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT * from Centro where Empresa_idEmpresa=$idEmpresa") or die(mysql_error());

if($resultado){

echo "<table id='t01' class='table table-hover table-bordered'>"; 
echo "<thead><tr>";
  echo  "<th>Nombre</th>";
  echo  "<th>Siglas</th>";
  echo  "<th>Editar Centro</th>";
  echo  "<th>Eliminar</th></thead><tbody>";
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['Nombre'] . "</td>";
  echo  "<td>" . $row['Siglas'] . "</td>" ;

   
  ?>
            <td>
    
        <input type="hidden" name="id" value="<?php echo $row['idCentro']; ?>" />
        <input type="submit" value="Editar Empresa" class='btn btn-info'/>
     
 </td>
 
 <td>
    
        <input type="hidden" name="id" value="<?php echo $row['idCentro']; ?>" />
        <input type="submit" value="Eliminar" class='btn btn-danger'/>
    
     </td>
     <?php 
     
  echo  "</tr>" ;

  

}
echo "</tbody></table>";
}
?>
 </div> 
