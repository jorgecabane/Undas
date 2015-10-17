<?php
session_start();
include_once dirname(__FILE__)."/../conexionLocal.php";

$email=$_POST['email'];
$rut=$_POST['rut'];

$query="SELECT * FROM tm Where Rut='$rut'";
		$result=mysql_query($query);
		if($result){
			$row=mysql_fetch_assoc($result);

			 if($row['Mail']==$email){
			 	$random=rand(1000000,9999999);
			 	$apellido=$row['Apellido'];
			 	$nuevapassword=$apellido.$random;
			 	$query2="UPDATE tm SET Password='$nuevapassword' WHERE Rut='$rut'";
			 			$resultado2=mysql_query($query2);
			 	if($resultado2){


		 		$to = $row['Mail'];
		 		$subject = "Recuperacion de contraseña";
		 		$txt = "tu nueva contraseña es:$nuevapassword";
		 		$headers = "From: serviciotenico@tmtecnomed.cl" . "\r\n";

		 		mail($to,$subject,$txt,$headers);

			echo "Revise el correo que le a otorgo tmtecnomed";
			?><meta http-equiv="Refresh" content="3;url=../logIn.php">;<?php
		 	}
			 }
		 	else
		 	{
		 	echo "correo incorrecto";
		 	?><meta http-equiv="Refresh" content="3;url=passwordRecovery.php">;<?php
		 	}
		}
else {
	echo "El mail no esta registrado en nuestra base de datos";
	?><meta http-equiv="Refresh" content="3;url=passwordRecovery.php">;<?php
}

?>
