<?php 
$month = date('m');
?>
<div class="row">
	<div class="col-xs-4  col-xs-offset-4 text-center hidden-print">
		<label>Seleccione Fecha</label> <select
			class="form-control text-center" name="month" id="month">
	<option value="1"  <?PHP if($month==1) echo "selected";?>>Enero</option>
	<option value="2"  <?PHP if($month==2) echo "selected";?>>Febrero</option>
	<option value="3"  <?PHP if($month==3) echo "selected";?>>Marzo</option>
	<option value="4"  <?PHP if($month==4) echo "selected";?>>Abril</option>
	<option value="5"  <?PHP if($month==5) echo "selected";?>>Mayo</option>
	<option value="6"  <?PHP if($month==6) echo "selected";?>>Junio</option>
	<option value="7"  <?PHP if($month==7) echo "selected";?>>Julio</option>
	<option value="8"  <?PHP if($month==8) echo "selected";?>>Agosto</option>
	<option value="9"  <?PHP if($month==9) echo "selected";?>>Septiembre</option>
	<option value="10" <?PHP if($month==10) echo "selected";?>>Octubre</option>
	<option value="11" <?PHP if($month==11) echo "selected";?>>Noviembre</option>
	<option value="12" <?PHP if($month==12) echo "selected";?>>Diciembre</option>
</select>
<select class="form-control text-center" name="year" id="year">
	<?PHP for($i=date("Y"); $i<=date("Y")+2; $i++)
		  	if($year == $i)
				echo "<option value='$i' selected>$i</option>";
			else
				echo "<option value='$i'>$i</option>";
	?>
</select>

	</div>
</div>
 
