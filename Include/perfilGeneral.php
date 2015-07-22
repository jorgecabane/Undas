<?php



$rut=$_POST['Rut'];

?>
<html>
    <head>
        
    </head>
        
        <div align="Left">
          
       
               
            
        </div>
        <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#productonuevo" data-toggle="tab">Datos Trabajador</a></li>
	   <li ><a href="#CobroPorCentro" data-toggle="tab">Cobros por Centro</a></li>
	  
      <li ><a href="#Semana1" data-toggle="tab">Horario Semana 1 </a></li>
	  
      <li ><a href="#Semana2" data-toggle="tab">Horario Semana 2</a></li>
	 
      <li ><a href="#Semana3" data-toggle="tab">Horario Semana 3</a></li>
	  
      <li ><a href="#Semana4" data-toggle="tab">Horario Semana 4</a></li>
	   
      
    </ul>
    <div id="myTabContent" class="tab-content">
    
      <div class="tab-pane fade in active" id="productonuevo">
        <table class="table table-bordered table-condensed  table-striped">

<h3><center>Informacion Trabajador</center></h3></div></div>
<br><br><br>
       <center><div>

           
       <?php
            include "../informacionTm.php";
                    ?>
                    </table> 
                   
      </div>
      <div class="tab-pane fade" id="Semana1">
       <center><h3>Horario Semana 1</h3></center>
    
      </div>
      <div class="tab-pane fade" id="Semana2">
       <center><h3>Horario Semana 2</h3></center>
    
      </div>
      <div class="tab-pane fade" id="Semana3">
       <center><h3>Horario Semana 3</h3></center>
    
      </div>
      <div class="tab-pane fade" id="Semana4">
       <center><h3>Horario Semana 4</h3></center>
    
      </div>
      <div class="tab-pane fade" id="CobroPorCentro">
       <center><h3>Cobros por Centro</h3></center>
       <br><br><br>
       
<center><section class="productList">
     <?php


$resultado = mysql_query("SELECT ValorHora.idValorHora as idvalor, Centro.idCentro as idcentro, ValorHora.Valor as valor,Centro.Nombre as nombre from ValorHora INNER JOIN Centro on Centro.idCentro=ValorHora.Centro_idCentro order by Centro.Nombre asc") or die(mysql_error());

if($resultado){

echo "<table cellspacing='0'>"; 
echo "<tr class='even'>";
  echo  "<td>Nombre Centro    </td>";
  echo  "<td>Valor    </td>" ;
  echo  "<td>Editar    </td>";
  echo  "<td>Eliminar</td>";
  echo  "</tr>" ;
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['nombre'] . "</td>";
  echo  "<td>" . $row['valor'] . "</td>" ;
  ?>
            <td>
     <form action="edit.php" method="post">
        <input type="hidden" name="idcentro" value="<?php echo $row['idcentro']; ?>" />
        <input type="hidden" name="idvalor" value="<?php echo $row['idvalor']; ?>" />
        <input type="submit" value="Editar" />
     </form>
 </td>
 <td>
     <form action="delete.php" method="post">
        <input type="hidden" name="idcentro" value="<?php echo $row['idcentro']; ?>" />
        <input type="hidden" name="idvalor" value="<?php echo $row['idvalor']; ?>" />
        <input type="submit" value="Eliminar" />
     </form>
     </td>
     
<?php     
     
  echo  "</tr>" ;
 
  

};
echo "</table>";
};?>
<form action="guardar.html">
                <input type="submit" value="Agregar Inventario">
</form>
    </section></center>
      </div>
     
      </div>


    </body>
</html>
