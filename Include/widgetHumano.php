<!DOCTYPE html>
<html>

<body>

<img src="images/humano.jpg" width="634" height="607" alt="humanwidget" class="map"  usemap="#humanwidget">

<map name="humanwidget">
   <area class='popover' shape="circle" coords="552,127,30" alt="Mano" href="#" data-toggle="popover" data-trigger="focus" title="Mano" content=" alo">
   <area shape="circle" coords="338,431,30" alt="Rodilla" href="#" >
   <area shape="circle" coords="321,321,30" alt="Pelvis" href="#" >
   <area shape="circle" coords="359,568,30" alt="Pie" href="#" >
   <area shape="circle" coords="177,138,30" alt="Codo" href="#" >
   <area shape="circle" coords="319,242,40" alt="Abdominal" href="#" >
   <area shape="circle" coords="351,162,30" alt="Mamaria" href="#" >
   <area shape="circle" coords="317,112,30" alt="Cervical" href="#" >
   <area shape="circle" coords="263,120,30" alt="Hombro" href="#" >
   <area shape="circle" coords="499,133,30" alt="Antebrazo" href="#" >
   <area shape="circle" coords="334,504,30" alt="Pierna" href="#" >
   <area shape="circle" coords="289,363,30" alt="Muslo" href="#" >
   <area shape="circle" coords="489,260,30" alt="Extras" href="#" >
</map>

</body>
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
	 $(".popover").click(function() {
	 $(this).popover({
         title: 'Prestaciones de ',
         content: '<div>Por que aparezco aqui ?</div>',
         html: true,
         animation: true
     });//popover
	   });
	</script>
</html>