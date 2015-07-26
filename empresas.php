<?php
session_start ();
include "header.php";
include "include/verificacionUsuario.php";

?>

<div class="container-fluid">
	<div class="row" id="header">
		<!--  aqui tiene que ir el include del header  -->


	</div>
	<div class="row">
		<h2>
			<center>Perfiles Empresas</center>
		</h2>
	</div>
	
	
	<div class="row">

 <?php // si es admin ve esto
				if($admin==1){
					?>
					<div class="col-sm-12 well  " id="perfil">
										<?php 		
			include "perfil/empresaGeneral.php";
				} 
							else {?>
								<div class="col-sm-10 well  " id="perfil">
							<?php   }	
					

		 					
?>

 <?php // si no admin ve esto
	
		
?>
		
			<!-- aqui va perfil -->
		</div>
	</div>









</div>
<script>
$( "#header" ).load( "include/verificacionUsuario.php" );   


</script>
<?php // si es admin ve esto
if($admin==1){
					?>
<script>
//Script que busca rellenar con el listado de los TMs que se encuentran en la bbdd
$( "#listado" ).load( "querys/todosTmListado.php" );   
</script>

<script>
$( document ).ready(function() {
 $("#call").focus(); }  
 );
</script>

<script>
 $( "#call" ).autocomplete({
                             /**
                             * esta función genera el autocomplete para el campo de comuna (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteComuna.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                $.ajax({
                                    url: "autoCompleteTm.php",
                                    data: {
                                        
                                        valor: request.term
                                    },
                                    type: "post",
                                    success: function( data ){
                                        
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre,
                                               id3: item.Rut
                                             }
                                            
                                        })//end map
                                      );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           minLength: 1,
                           select: function(event, ui){
                                var idTM=ui.item.id3;

$( "#perfil" ).load( "perfil/empresaGeneral.php" , {"Rut":idTM} );
//$( "#fototm" ).load( "include/fotoTmAutocomplete.php" , {"Rut":idTM} );
                                }//end select
                            });//autocompleteComuna


//CAMBIAR LA QUERY PARA GUARDAR LOS DATOS!
</script>
<?php 		}			
?>
<?php
if($admin==0){
	
	$sessionrut=$_SESSION['idusuario'];
	
	$query = "SELECT Rut FROM TM WHERE idTM=$sessionrut";
	
	$res = mysql_query ( $query ) or die ( mysql_error () );
	
	 $row = mysql_fetch_assoc( $res );
	$Rut=$row["Rut"];
	
	
					?>
<script>
$( "#perfil" ).load( "perfil/empresaGeneral.php" , {"Rut":<?php echo $Rut;?>} );
</script>
<?php 		}			
?>


