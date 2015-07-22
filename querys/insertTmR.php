
<?php
         include_once "../conexionLocal.php";
         $nombre=$_POST['nombre'];
          $apellido=$_POST['apellido'];
          $rut=$_POST['rut'];
          $mail=$_POST['mail'];
          $celular=$_POST['celular'];
          $contraseña=$_POST['contrasena'];
          $repetircontraseña=$_POST['repetircontrasena']; 
          
         if($contraseña == NULL) {
             echo "Ingrese una contraseña";
             ?>
        <meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
        <?php
             
             
         }
         else{
         if($contraseña == $repetircontraseña){
              //comprobamos si ha ocurrido un error.

	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 3000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "../FotoPerfil/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                        $holi=$_FILES["imagen"]["name"];
                        $query="insert into TM values (null,'$nombre','$apellido','$rut','$mail','$celular','$holi','$contraseña',0)";    
    $resultado2=mysql_query($query) ;
    if($resultado2 && $resultado){   
         echo "Perfecto, redireccionando";
        ?>
       
        <meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
        <?php
    }
    else{
         echo "Error el rut ya existe, intente denuevo";
        ?>
       
        <meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
        <?php
        
    }
    
			if ($resultado){
				//      echo "el archivo ha sido movido exitosamente";
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe prueba otro nombre";
                         ?>
                          <meta http-equiv="Refresh" content="1;url=../agregarTmR.php">
                         <?php
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}


    
         
         }
         
         
    
   else{
        echo " Las contraseñas no coinciden, redireccionando";
        ?>
    <meta http-equiv="Refresh" content="1;url=../agregarTmR.php">; 
    <?php
    }
         }
         
    ?>
    