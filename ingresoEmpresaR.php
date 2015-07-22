<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once "conexion.php";
         $nombre=$_POST['nombre'];
          $rut=$_POST['rut'];
           $giro=$_POST['giro'];
          $direccion=$_POST['direccion'];
            $comuna=$_POST['comuna'];
             $ciudad=$_POST['ciudad'];
              
              
    $query="insert into empresa values (null,'$nombre',$rut,'$giro','$direccion','$comuna','$ciudad')";    
    $resultado=mysql_query($query) ;
    if($resultado) { 
    //success 
        echo"Agregado con exito, redireccionando";
        ?><meta http-equiv="Refresh" content="3;url=agregarEmpresaR.php">;
        <?php
} else { 
    //failure
    echo " Error el rut o giro ya existe intente otro, redireccionando";
    ?>
        
    <meta http-equiv="Refresh" content="3;url=agregarEmpresaR.php">;
    <?php
}        
    ?>
    </body>
</html>
