<?php
include "header.php";
session_start();
include_once "conexion.php";
?>
<html>
    <head>
        
    </head>
       <body background="images/bg.gif">
        <div align="Center">
            $query="SELECT * FROM $tablename;";
        </div>
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

                            <center><div><label>Nombre Trabajador:</label> Mihail Pozarski </div></center>
                            <center><div><label>Mail:</label> mpozarski944@gmail.com </div></center>
                            <center><div><label>Celular:</label> +56982683417    </div></center>
                            <center><div><label>Rut:</label> 11111111-1         </div></center>
                           
                    
                    </table>
                   
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
