<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once "../conexionLocal.php";
         $idCentro=$_POST['centro'];
            $idEmpresa=$_POST['empresa'];
          $mes=$_POST['mes'];
           $ano=$_POST['año'];
             $cupos=trim($_POST['CantidadCupos']);
          
              
              
    $query="insert into cuposlimite values (null,$cupos,$idCentro,$idEmpresa,$mes,$ano)";    
    $resultado=mysql_query($query);
    if($resultado) { 
    //success 
        echo"Agregado con exito, redireccionando";
        ?><meta http-equiv="Refresh" content="1;url=../AgregarDatosMensualesR.php">;
        <?php
} else { 
    //failure
    echo " ya se agregaron datos para el mes o año seleccionado, redireccionando";
    ?>
        
    <meta http-equiv="Refresh" content="1;url=../AgregarDatosMensualesR.php">;
    <?php
}        
    ?>
    </body>
</html>
