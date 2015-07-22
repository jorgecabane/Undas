<?php
session_start();
include "header.php";
include "include/verificacionUsuario.php";


?>
<body background="bg.gif">
 <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#productonuevo" data-toggle="tab">Producto Nuevo</a></li>
	  <?php
	  
	  ?>
      <li ><a href="#agregarinventario" data-toggle="tab">Agregar a Inventario</a></li>
	  <?php 
	  ?>
         
      
    </ul>
    <div id="myTabContent" class="tab-content">
    
      <div class="tab-pane fade in active" id="productonuevo">
        <table class="table table-bordered table-condensed table-hover table-striped">

<h3><center>Ingresar Producto Nuevo</center></h3></div></div>


                            <div><label>Nombre Producto: </label><input name="producto" id="producto" type="text" onfocus="clearField(this);"></div>
                            <div><label>Codigo:          </label><input name="codigo" id="codigo" type="number" style="height:26px" placeholder="Utilice lector de barra o manual." onfocus="clearField(this);"></div>
                            <div><label>Precio: </label><input name="precio" id="precio"  type="text" style="height:26px" onfocus="clearField(this);"></div>
                            <div><label>Costo: </label><input name="costo" id="costo" type="text" style="height:26px" onfocus="clearField(this);"></div>
                            <button class="btn btn-success" id="ingresar">Ingresar</button><br>
                            <div id="cargando1"><div>
                    
                    </table>
                   
      </div>
      <div class="tab-pane fade" id="agregarinventario">
       <center><h3>Ingresar a inventario </h3></center>
    <table class='table table-bordered table-striped table-hover table-condensed'>
        <tr><td>
        <?php
                        include "conexion.php";

                        $query = "select idInsumos I, Nombre N from insumos order by nombre asc ";

                        //echo $query;
                        $resultado = mysql_query($query) or die(mysql_error());
                        if ($resultado) {
                            echo"<select name='insumo' id='insumo'>";
                            echo "<option value=0>Seleccione Producto</option>";
                            while ($row = mysql_fetch_assoc($resultado)) {

                                echo "<option value='" . $row['I'] . "'>" . $row['N'] . "</option>";
                            }
                            echo"</select>";
                        }
                        ?>
        </td><td>Agregar a <?php
                        include "conexion.php";

                        $query = "select usuario U, idUsuario I from usuarios where tipo=0 order by usuario asc ";

                        //echo $query;
                        $resultado = mysql_query($query) or die(mysql_error());
                        if ($resultado) {
                            echo"<select name='usuario' id='usuario'>";
                            echo "<option value=0>Seleccione Producto</option>";
                            while ($row = mysql_fetch_assoc($resultado)) {

                                echo "<option value='" . $row['I'] . "'>" . $row['U'] . "</option>";
                            }
                            echo"</select>";
                        }
                        ?><br>La cantidad de <input type="number" style="height:26px" id="nuevostock" name="nuevostock" onfocus="clearField(this);"><br>
                
                <center><button class="btn btn-success" id="cambio">Cambiar</button></center><br><div id="cargando"></div></td></tr>
               
      </div>
     
      </div>

<?php
include "footer.php";
?>
</body>