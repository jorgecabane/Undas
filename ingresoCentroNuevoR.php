<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once "conexion.php";
         $idEmpresa=$_POST['empresa'];
          $nombre=$_POST['nombre'];
           $siglas=$_POST['siglas'];
          
              
              
    $query="insert into Centro values (null,$idEmpresa,'$nombre','$siglas')";    
    $resultado=mysql_query($query) ;
    if($resultado) { 
    //success 
        echo"Agregado con exito, redireccionando";
        ?><meta http-equiv="Refresh" content="3;url=agregarCentroNuevoR.php">;
        <?php
} else { 
    //failure
    echo " El nombre o sigla ya existe, redireccionando";
    ?>
        
    <meta http-equiv="Refresh" content="3;url=agregarCentroNuevoR.php">;
    <?php
}        
    ?>
    </body>
</html>
