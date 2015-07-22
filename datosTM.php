<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "conexion.php";

$rut=$_POST['Rut'];
$result=mysql_query("Select Nombre, Imagen, Apellido, Mail, Celular from TM Where Rut=$rut");
            $hola=  mysql_fetch_assoc($result);
            $imagen=$hola['Imagen'];
            $nombre=$hola['Nombre'];
            $apellido=$hola['Apellido'];
            $mail=$hola['Mail'];
            $celular=$hola['Celular'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie7.css" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" />
	</head>
<body background="images/bg.gif">
    <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#productonuevo" data-toggle="tab">Datos Trabajador</a></li>
       <li ><a href="#CobroPorCentro" data-toggle="tab">Cobros por Centro</a></li>
       
      <li ><a href="#Semana1" data-toggle="tab">Horario Semana 1 </a></li>
       
      <li ><a href="#Semana2" data-toggle="tab">Horario Semana 2</a></li>
      
      <li ><a href="#Semana3" data-toggle="tab">Horario Semana 3</a></li>
       
      <li ><a href="#Semana4" data-toggle="tab">Horario Semana 4</a></li>
        
       
    </ul>
    <div id="myTabContent" class="tab-content">
     
      <div class="tab-pane fade in active" id="productonuevo">
        <table class="table table-bordered table-condensed  table-striped">
 
<h3><center>Informacion Trabajador</center></h3></div></div>
<br><br><br>
       <center>
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
					<li class="home"><a href="#"><img src="images/twitter.png" alt="Twitter" /></a></li>
					<li><a href="#"><img src="images/facebook.png" alt="Facebook" /></a></li>
					<li><a href="#"><img src="images/flickr.png" alt="Flickr" /></a></li>
					<li><a href="#"><img src="images/myspace.png" alt="Myspace" /></a></li>
					<li><a href="#"><img src="images/rss.png" alt="Rss" /></a></li>
					<li><a href="#"><img src="images/su.png" alt="Su" /></a></li>
					<li><a href="#"><img src="images/tech.png" alt="Tech" /></a></li>
					<li><a href="#"><img src="images/wordpress.png" alt="Wordpress" /></a></li>
					<li><a href="#"><img src="images/yahoo.png" alt="Yahoo" /></a></li>
					<li><a href="#"><img src="images/youtube.png" alt="Youtube" /></a></li>
					<li><a href="#"><img src="images/dell.png" alt="Dell" /></a></li>
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
	<script type="text/javascript" src="js/lobster.cufonfonts.js"> </script>
	<script type="text/javascript">
		Cufon.replace("h1,h2,h3"); 
	</script>
	<!--cufon end-->
                    
      </div>
      <div class="tab-pane fade" id="Semana1">
       <center><h3>Horario Semana 1</h3></center>
     
      </div>
      <div class="tab-pane fade" id="Semana2">
       <center><h3>Horario Semana 2</h3></center>
     
      </div>
      <div class="tab-pane fade" id="Semana3">
       <center><h3>Horario Semana 3</h3></center>
     
      </div>
      <div class="tab-pane fade" id="Semana4">
       <center><h3>Horario Semana 4</h3></center>
     
      </div>
      <div class="tab-pane fade" id="CobroPorCentro">
       <center><h3>Cobros por Centro</h3></center>
       <br><br><br>
        
<center><section class="productList">
    <div class="product">
        <span class="name">clinica las Condes</span><span class="price">$2000/Hr<a href="url">   Editar</a></span>
    </div>
    <div class="product">
        <span class="name">Clinica UC</span><span class="price">$1800/Hr<a href="url">   Editar</a></span>
    </div>
    <div class="product">
        <span class="name">Clinica Indisa</span><span class="price">$2100/Hr<a href="url">   Editar</a></span>
    </div>
    <div class="product">
        <span class="name">Clinica Alemana</span><span class="price">$1850/Hr<a href="url">   Editar</a></span>
    </div>
    </section></center>
      </div>
      
      </div>
 
 
    </body>
</html>
	