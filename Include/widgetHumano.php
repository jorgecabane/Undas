<!DOCTYPE html>
<html>
    <script type="text/javascript" src="../maphilight-master/jquery.maphilight.js"></script>


<img src="images/humano.jpg" width="634" height="607" alt="humanwidget" class="map"  usemap="#humanwidget">

<map name="humanwidget">
   <area shape="circle" coords="580,127,30" alt="Mano" href="#" title="Prestaciones Mano" data-toggle="popover" data-trigger="focus" data-placement="auto" >
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
</map>

	<script type="text/javascript">
	$(function() {
		 $('.map').maphilight({
			 fill: true,
				fillColor: 'FFCC99',
				fillOpacity: 0.3,
				stroke: true,
				strokeColor: 'CC5252',
				strokeOpacity: 1,
				strokeWidth: 2,
				alwaysOn: true,
				shadow: true,
				shadowX: 0,
				shadowY: 0,
				shadowRadius: 8,
				shadowColor: '000000',
				shadowOpacity: 0.8,
				shadowPosition: 'outside',
				shadowFrom: false
	        });
	});</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
    	

        	 
      
        content: '<div><b><h4>Especifico: </h2></b><br>\n\
        	             <b>TM: </b><br>\n\
                         <b>TM: </b><br>\n\
                         </div>',
        html: true,
        animation: true
    });//popover
});
</script>
</html>