       <?php
        include_once dirname(__FILE__) . "/../conexionLocal.php";

        $id = trim($_POST['bugid']);

                $query = "UPDATE bugs SET status = 1 WHERE id=$id";
                $resultado = mysql_query($query);
                if ($resultado) {
                    //success
                    echo"Bug cerrado";
                } else {
                    //failure
                    echo " Se produjo un error en la actualizacion";  
                }
        ?>
