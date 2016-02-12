<?php
session_start ();
include_once dirname ( __FILE__ ) . "/header.php";
include_once dirname ( dirname ( __FILE__ ) ) . "/Include/verificacionUsuario.php";
include_once dirname ( dirname ( __FILE__ ) ) . "/querys/getEmpresa.php";
include_once dirname ( dirname ( __FILE__ ) ) . "/querys/getTM.php";
?>
<div class="container-fluid well">
	<div class="row">



		<div class="col-sm-4 panel panel-info">
			<div class="panel-heading">
				<h4>
					<strong>Ingreso como TM </strong>
				</h4>
			</div>

			<div class="panel-body row-fluid"></div>
			<!-- Aqui va el Select de todos los Tm con values = a su id --->
			<br> <select class="form-control text-center" id="tms">
				<option value="" disabled selected>Seleccione Tecn&oacute;logo</option>
                <?php
																$tms = getTM ();
																foreach ( $tms as $tm ) {
																	?>
                    <option value="<?php echo $tm['idTM']; ?>"><?php
																	echo $tm ['Nombre'];
																	echo " ";
																	echo $tm ['Apellido'];
																	?></option>
                    <?php
																}
																?>
            </select> <br>
			<center>
				<button type="button" class="btn btn-info btn-lg tecnologo">Ingresar</button>
			</center>
			<br>
			<!-- Aqui termina select TM --->
		</div>


		<div class="col-sm-4 panel panel-danger">
			<div class="panel-heading">
				<h4>
					<strong>Ingreso como SuperAdmin</strong>
				</h4>
			</div>

			<div class="panel-body row-fluid"></div>
			<br>
			<br>
			<br>
			<br>
			<center>
				<button type="button" class="btn btn-danger btn-lg superadmin">Ingresar</button>
			</center>
			<br>
		</div>



		<div class="col-sm-4 panel panel-success">
			<div class="panel-heading">
				<h4>
					<strong>Ingreso como Empresa</strong>
				</h4>
			</div>

			<div class="panel-body row-fluid"></div>

			<!-- Aqui va el Select de todas las Empresas con values = a su id --->
			<br> <select class="form-control text-center" id="emp">
				<option value="" disabled selected>Seleccione Empresa</option>
                <?php
																$empresas = getEmpresa ();
																foreach ( $empresas as $empresa ) {
																	if ($empresa ['Nombre'] != 'Sin Turno') {
																		?>
                        <option
					value="<?php echo $empresa['idEmpresa']; ?>"><?php echo $empresa['Nombre']; ?></option>
                        <?php
																	}
																}
																?>
            </select> <br>
			<center>
				<button type="button" class="btn btn-success btn-lg empresa">Ingresar</button>
			</center>
			<br>
			<!-- Aqui termina select empresas --->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 well well-sm">
			<i class="glyphicon glyphicon-download pull-right"></i>
			<div class="panel panel-default">
                <?php include_once dirname(__FILE__) . "/Include/logs.php"; ?>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 well well-sm">
			<i class="glyphicon glyphicon-download pull-right"></i>
			<center>
				<h3>Reporte de bugs</h3>
			</center>
			<div class="panel panel-default">
            <?php include_once dirname(__FILE__) . "/Include/bugs.php"; ?>
        </div>
		</div>
	</div>
	
</div>


</body>
<script>
    $(".superadmin").click(function() {
        $(location).attr('href', 'admin.php');
    });
</script>
<script>
    $(".tecnologo").click(function() {
        var nombre = $('#tms    :selected').text();
        var id = $('#tms :selected').val();
        $(location).attr('href', "tecnologo.php?id=" + id + "&nombre=" + nombre);
    });
</script>
<script>
    $(".empresa").click(function() {
        var nombre = $('#emp :selected').text();
        var id = $('#emp :selected').val();
        $(location).attr('href', "empresa.php?id=" + id + "&nombre=" + nombre);
    });
</script>
<script>
$(".closebug").click(function() {
	   var checkbox = $(this);
	   var bugid = checkbox.val();
	   var row = checkbox.parent().parent();
	    jQuery.ajax({
            method: "POST",
            url: "querys/closebug.php",
            data: {
                "bugid": bugid,
            },
            success: function(response)
            {
               row.remove();
               alert("Bug status closed.");
            }
        });    
});
</script>