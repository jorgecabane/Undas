<?php 
session_start();
include_once "conexionLocal.php";

$email=$_POST['email'];
$rut=$_POST['rut'];
	
	$query="SELECT * FROM TM WHERE Rut=$rut AND Mail like '$email'";
	
	$result   = mysql_query($query);
	
	
	if($result){
	
	$rows=mysql_fetch_array($result);
	
	$pass  =  $rows['Password'];//FETCHING PASS
	//echo "your pass is ::".($pass)."";
	$to = $rows['Mail'];
	//echo "your email is ::".$email;
	//Details for sending E-mail
	$from = "TmTecnomed";
			$url = "http://tmtecnomed.cl//";
			$body  =  "TmTecnomed Recuperacion de clave
			Url : $url;
			email Details is : $to;
			Here is your password  : $pass;
			lo saluda,
			TmTecnomed";
			$from = "soportetecnico@tmtecnomed.cl";
			$subject = "Tmtecnomed clave recuperada";
			$headers1 = "From: $from\n";
			$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
			$headers1 .= "X-Priority: 1\r\n";
			$headers1 .= "X-MSMail-Priority: High\r\n";
			$headers1 .= "X-Mailer: Just My Server\r\n";
			$sentmail = mail ( $to, $subject, $body, $headers1 );
	} else {
			if ($_POST ['email'] != "") {
				echo "<span style='color: #ff0000;'> Not found your email in our database</span>";
			}
		}
		//If the message is sent successfully, display sucess message otherwise display an error message.
		if($sentmail==1)
			{
				echo "<span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span>";
			}
		else
			{
				if($_POST['email']!="")
					echo "<span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span>";
			}

?>
