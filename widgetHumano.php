<?php
session_start();
include_once dirname(__FILE__) . "/header.php";
?>
<html>

    <meta charset="utf-8">

    
      <!-- <script type="text/javascript" src="maphilight-master/jquery.maphilight.js"></script> -->

<div id="#map" style="position:relative; width:634px; height:607px; z-index:0; background-image:url(images/humano.jpg)">

<a class="popovereable" id="well map-link-1" href="#" shape="circle" 
title="Mano" data-toggle="popover" data-trigger="focus" data-placement="auto"
style="position:absolute;top:105px;left:540px;width:50px;height:50px; border: 2px solid red;border-radius: 50px;">&nbsp;</a>

<a class="popovereable" id="well map-link-2" href="#" shape="circle" 
title="Pelvis Masculina" data-toggle="popover" data-trigger="focus" data-placement="auto"
style="position:absolute;top:290px;left:300px;width:50px;height:50px; border: 2px solid red;border-radius: 50px;">&nbsp;</a>
  <!--  <area shape="circle" coords="580,127,30" alt="Mano" href="#" title="Prestaciones Mano" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="338,431,30" alt="Rodilla" href="#" title="Prestaciones Rodilla" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="321,321,30" alt="Pelvis" href="#" title="Prestaciones Pelvis" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="359,568,30" alt="Pie" href="#" title="Prestaciones Pie" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="177,138,30" alt="Codo" href="#" title="Prestaciones Codo" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="319,242,40" alt="Abdominal" href="#" title="Prestaciones Abdominal" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="351,162,30" alt="Mamaria" href="#"  title="Prestaciones Mamaria" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="317,112,30" alt="Cervical" href="#" title="Prestaciones Cervical" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="263,120,30" alt="Hombro" href="#" title="Prestaciones Hombro" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="499,133,30" alt="Antebrazo" href="#" title="Prestaciones Antebrazo" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="334,504,30" alt="Pierna" href="#" title="Prestaciones Pierna" data-toggle="popover" data-trigger="focus" data-placement="auto" >
   <area shape="circle" coords="289,363,30" alt="Muslo" href="#" title="Prestaciones Muslo" data-toggle="popover" data-trigger="focus" data-placement="auto">
   <area shape="circle" coords="489,260,30" alt="Extras" href="#" title="Prestaciones Extras" data-toggle="popover" data-trigger="focus" data-placement="auto" >
 -->
</div>

<script>

	$(".popovereable").each(function(){
		var especifico = $(this).attr('title');
		//var idEmpresa = aqui va la id de la empresa (si es que se mete un centro);
		var contenido = $(this);
		
	
		    $.ajax({
	    	method: "POST",
	        url: "querys/getPrestacionesWidget.php",
	        data: { 
		           'especifico': especifico,
		        // 'idEmpresa': idEmpresa 
	              },
	        success: function(response){
	            contenido.attr("data-content",response);
	       							   }
	    });
	    
	

	});

</script>
<script>
$(".popovereable").popover({
	
    html: true,
    animation: true,
    trigger: 'hover',
});//popover
</script>
</html>