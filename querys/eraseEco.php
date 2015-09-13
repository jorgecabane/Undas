<?php
include_once "../conexionLocal.php";


$id=$_POST['ideco'];


$query="DELETE FROM ecos WHERE idEcos=$id";

$resultado=mysql_query($query);
if($resultado) {
	//success
	echo "success";
	
} else { 
    //failure
    echo "fail";
   
}   

