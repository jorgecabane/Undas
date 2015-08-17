<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once "../conexionLocal.php";
         $nombre=$_POST['nombre'];
          $rut=$_POST['rut'];
           $giro=$_POST['giro'];
          $direccion=$_POST['direccion'];
            $comuna=$_POST['comuna'];
             $ciudad=$_POST['ciudad'];
             $razon=$_POST['razon'];
              
              
    $query="insert into Empresa values (null,'$nombre',$rut,'$giro','$direccion','$comuna','$ciudad','$razon')";    
    $resultado=mysql_query($query) ;
    if($resultado) { 
    //success 
        echo"Agregado con exito, redireccionando";
        ?><meta http-equiv="Refresh" content="1;url=../agregarEmpresaR.php">;
        <?php
} else { 
    //failure
    echo " Error el rut o giro ya existe intente otro, redireccionando";
    ?>
        
    <meta http-equiv="Refresh" content="1;url=../agregarEmpresaR.php">;
    <?php
}        
    ?>
    </body>
</html>
