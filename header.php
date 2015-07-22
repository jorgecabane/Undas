<?php 

include "conexionLocal.php";
include "include/isAdmin.php";

$result=mysql_query("Select * from Centro");
if($_SESSION["usuario"]){
	if(isAdmin($_SESSION["idusuario"])==1){
		$admin=1;
	}
	else{
		$admin=0;
	}}
		
 ?>       				
 <div align="left">
  
  <img src="images/logo.gif" width="400" height="80" alt="logo"  />

</div>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/Unda/index.php">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      
      <?php // si es admin ve esto
				if($admin==1){
					?>
                       <!-- este es un dropdown -->
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Horarios <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
				<?php 
				while ($row = mysql_fetch_array($result)) {?>
					<li>
					<a href='pillsTm.php?id=<?php echo $row['idCentro'] ;?>' ><?php echo $row['Nombre']; ?></a>
					</form>
				
					</li><?php 
				}
				
				?>
           </ul>
        </li>
      <?php } // si es admin ve esto?>
      <!-- aqui termina -->
	  <!-- este es un dropdown -->
		 <?php // si es admin ve esto
				if($admin==1){
					?>
					<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ingreso de Datos <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="agregarTmR.php">Tecnologos Medicos</a></li>
            <li><a href="agregarEmpresaR.php">Empresa nueva</a></li>
            <li><a href="agregarCentroNuevoR.php">Centro nuevo</a></li>
           </ul>
        </li>
        <?php } // si es admin ve esto?>
		 <li><a href="schedule.php">Resumen Horarios</a></li>
		 <li><a href="Perfiles.php">Perfiles TM</a></li>
		
		 
		
		 <li><a href="editarClave.php">Editar Clave</a></li>
				
      </ul>
      <!-- aqui termina -->
	 
      <ul class="nav navbar-nav navbar-right">
       <li><a href="logOff.php"><?php echo $_SESSION['usuario'];?>  (Cerrar sesión)</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
