<!DOCTYPE html>
<html lang="en">
<head>
	<title>Estructura Basica</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
<a id="call" class="btn btn-primary" href="#" data-dismiss="alert" role="button">Ejecutar AJAX</a>



<script>
$( "#call" ).click(function() {
  $.ajax({
		url: "json1.php" , //archivo php que contiene la info
		data: "1234", //variable(s) que se enviaran al archivo php
		type: 'post', //tipo de envio $_POST o $_GET
		async: true, //sincronico o asincronico (async por default)
		success: function(output){
			output = $.parseJSON(output);
			$('body').html("<div class='alert alert-error' role='alert'>"+output['Mail']+"</div>");
		}
	});
});//end click




</script>

<div>

</div>







</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</html>
<!--
 //end ajax -->