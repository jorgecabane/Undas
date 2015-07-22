<?php
session_start();

include "header.php";
//include "BuscarInfoTm.php"
?>
<html lang="en">
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2 well well-sm">
			<div class="row-fluid">
			<input class="form-control" type="text" placeholder="Input de ejemplo">
			</div>
			<hr class="small">
                        <?php
                        $result=mysql_query("Select idTM, Nombre, Apellido from TM");
                        while($array=mysql_fetch_assoc($result)){            
            $apellido=$array['Apellido'];
            $nombre=$array['Nombre'];  
            $id=$array['idTM'];
          
            ?>
                        
                        <div  class="btn btn-block btn-small btn-info btn-lg infotm"  role="alert" data-toggle="modal" data-target="#myModal"  id="<?php echo$id;?>">
  				
  				<small><?php echo $nombre; echo" "; echo $apellido;?></small>
			</div>
                        
                        <?php }?>
		</div>
		<div class="col-sm-10">
			<div class="row well well-sm">
				<div class="col-sm-1"><a class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span></a></div>
				<div class="col-sm-10"><center><strong>Semana x</strong></center></div>
				<div class="col-sm-1"><a class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></div>
			</div>
			<div class="row" id="calendar"></div>
		</div>
	</div>
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="header" >Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   
      <!-- //Modal -->
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>


<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



<script>
$(".infotm").click(function(){
var id = $(this).attr("id");
$("#header").html(id);
});
</script>




<script>
$(".infotm").click(function(){
    var id = $(this).attr("id");
alert('Alerta ' + id);

source: function( request, response ){
                                $.ajax({
                                    url: "BuscarInfoHorario.php",
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
                               
                            }



});
</script>

</html>