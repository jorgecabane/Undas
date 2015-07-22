<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         include_once "/conexionLocal.php";
           
         $id=$_POST['id'];
         $claveantigua=$_POST['claveantigua'];
         $clavenueva=$_POST['clavenueva'];
         $repetirclave=$_POST['repetirclave'];
         echo $id;
         
         $result=mysql_query("Select Password from TM Where idTM=$id");
         $hola=mysql_fetch_assoc($result);
         $password=$hola['Password'];
         
         if($password==$claveantigua){
         
    if($repetirclave == $clavenueva){
                      
    $query="UPDATE TM SET Password=$clavenueva WHERE id=$id";    
    $resultado=mysql_query($query) ;
    if($resultado) { 
    //success 
        echo"Actualizado con exito, redireccionando";
        ?><meta http-equiv="Refresh" content="4;url=index.php">
        <?php
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
    ?>
        
    <meta http-equiv="Refresh" content="4;url=editarClave.php">
    <?php
}   
    }   
else{  
	echo "Las claves nuevas no coinciden";
        		?>
        
    <meta http-equiv="Refresh" content="4;url=editarClave.php">
    <?php
}
         }
         else{
         	echo "La clave antigua es incorrecta, intente denuevo";
        		?>
        
    <meta http-equiv="Refresh" content="4;url=editarClave.php">
    <?php
         }
    ?>
    </body>
</html>
