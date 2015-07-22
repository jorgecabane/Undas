<?php
include "conexionLocal.php";

$rut=$_POST['Rut'];
$result=mysql_query("Select Nombre, Imagen, Apellido, Mail, Celular from TM Where Rut=$rut");
            $hola=  mysql_fetch_assoc($result);
            $imagen=$hola['Imagen'];
            $nombre=$hola['Nombre'];
            $apellido=$hola['Apellido'];
            $mail=$hola['Mail'];
            $celular=$hola['Celular'];
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!--<link rel="stylesheet" type="text/css" href="css/style.css" /> -->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie7.css" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" />
	</head>
    <body >
 <div id="container-wrapper">
		<div id="container">
			<div id="header">
				<h1><?php echo ' '."$nombre".' '."$apellido"; ?></h1>
				<img src="FotoPerfil/<?php echo $imagen; ?>" width='50px' height="50px" alt="Logo" id="logo" />
				<p>Rut:<?php echo ' '."$rut"; ?></p>
			
				
			</div> <!---end-header-->
		
			<div id="main">
				<div id="helloThere">
					<h2>INFO</h2>
					
				</div> <!---end-helloThere-->
				<div id="contactMe">
					<ul>
						
                                            <li class="telp">Cel:<?php echo ' '."$celular"; ?></li>
                                            <li class="email">Mail:<?php echo ' '."$mail"; ?></li>
						
						
						
					</ul>
				</div><!--end-contactMe-->
			
			
				<div id="socialNetwork">
					<ul>
					
					<li><a href="#"><img src="images/facebook.png" alt="Facebook" /></a></li>
					
					</ul>
				</div> <!--end-socialNetwork-->
			</div> <!--end-main-->
		</div> <!--end-container-->	
	</div> <!--end-container-wrapper-->
	

	<script type="text/javascript" src="js/jquery.1.7.2.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("a[rel=fancybox-gallery]").fancybox();
		});

	</script>
	
	<!--cufon here-->
	<script type="text/javascript" src="js/cufon-yui.js"> </script>

	<script type="text/javascript">
		Cufon.replace("h1,h2,h3"); 
	</script>
	<!--cufon end-->
                    
      
     
 
 
    </body>
</html>
	