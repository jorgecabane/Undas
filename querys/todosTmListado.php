
<?php
include_once('getTM.php'); //funcion getTM
$tms = getTM();

?>
<ul class="nav nav-pills nav-stacked">

<?php
foreach($tms as $tm){
	?><li role="presentation" class="active fc-event" rut="<?php echo $tm['Rut'];?>"><a href="#"><?php echo $tm['Nombre'].' '.$tm['Apellido'].'<br>';	?></a></li> 
<?php
}
?>
</ul>
