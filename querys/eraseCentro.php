<?php
include_once "../conexionLocal.php";


$id=$_POST['idcentro'];


$query="DELETE FROM centro WHERE idCentro=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"success";
	
} else { 
    //failure
    echo "fail";
   
}   

