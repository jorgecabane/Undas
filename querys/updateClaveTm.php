<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once dirname(__FILE__) . "/../conexionLocal.php";

        $id = $_POST['id'];
        $claveantigua = $_POST['claveantigua'];
        $clavenueva = $_POST['clavenueva'];
        $repetirclave = $_POST['repetirclave'];


        $result = mysql_query("Select Password from tm Where idTM=$id");
        $hola = mysql_fetch_assoc($result);
        $password = $hola['Password'];

        if ($password == $claveantigua) {

            if ($repetirclave == $clavenueva) {

                $query = "UPDATE tm SET Password='$clavenueva' WHERE idTM=$id";
                $resultado = mysql_query($query);
                if ($resultado) {
                    //success
                    echo"Actualizado con exito";
                    //<meta http-equiv="Refresh" content="4;url=../index.php">
                    
                } else {
                    //failure
                    echo " Se produjo un error en la actualizacion";
                  

                   // <meta http-equiv="Refresh" content="4;'url=../editarClave.php">
                  
                }
            } else {
                echo "Las claves nuevas no coinciden";
                

                //<meta http-equiv="Refresh" content="4;url=../editarClave.php">
               
            }
        } else {
            echo "La clave antigua es incorrecta, intente denuevo";
            

           // <meta http-equiv="Refresh" content="4;url=../editarClave.php">
       
        }
        ?>
    </body>
</html>
