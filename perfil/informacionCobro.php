<center><section class="productList">





     
        
    </head>
    <body>
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT ValorHora.Valor as Valor, ValorHora.Semana as Semana, Centro.Nombre as Centro from TM inner join ValorHora on TM.idTM = ValorHora.Tm_idTM inner join Centro on Centro.idCentro = ValorHora.Centro_idCentro Where TM.Rut=$rut") or die(mysql_error());

if($resultado){

echo "<table id='t01'>"; 
echo "<tr >";
  echo  "<td>Centro</td>";
  echo  "<td>Cobro</td>" ;
  echo  "<td>Semana=1, Fin de semana=0</td>";
  echo  "<td>Editar</td>" ;
  echo  "<td>Eliminar</td>" ;
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['Centro'] . "</td>";
  echo  "<td>" . $row['Valor'] . "</td>" ;
  echo  "<td>" . $row['Semana'] . "</td>";
 
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