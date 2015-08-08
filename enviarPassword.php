<?php 
session_start();
include_once "conexionLocal.php";

$email=$_POST['email'];
$rut=$_POST['rut'];

$query="SELECT * FROM TM Where Rut=$rut";
		$result=mysql_query($query);
		if($result){
			$row=mysql_fetch_assoc($result);
			
			 if($row['Mail']==$email){
			 	$random=rand(1000000,9999999);
			 	$apellido=$row['Apellido'];
			 	$nuevapassword=$apellido.$random;
			 	echo $nuevapassword;
			 	$query2="UPDATE TM SET Password='$nuevapassword' WHERE Rut=$rut";
			 			$resultado2=mysql_query($query2);
			 	if($resultado2){
			 
			 	
		 		$to = $row['Mail'];
		 		$subject = "Recuperacion de contraseña";
		 		$txt = "tu nueva contraseña es:$nuevapassword";
		 		$headers = "From: serviciotenico@tmtecnomed.cl" . "\r\n";
		 	
		 		mail($to,$subject,$txt,$headers);
			 	}
			 	else{
			 		echo "no se updatea la password";
			 	}
			echo "Revise el correo que le otorgo tmtecnomed";
		 	}
		 	else
		 	{
		 	echo "correo incorrecto";
		 	}
		}
else {
	echo "El mail no esta registrado en nuestra base de datos";
}

?>
