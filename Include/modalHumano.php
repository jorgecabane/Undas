<div id="modalHumano" class="modal fade" style="overflow: hidden;">
    <div  class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h4 class="modal-title">Prestaciones Tecnologos Medicos TMTECNOMED</h4>

		</div>
		<div class="modal-body" style="background: #2F2F2F;">
		<center>
		     <div id="progress2" class="progress" style="display: none">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" style="width: 100%">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
               <?php require_once "widgetHumano.php"; ?>
            </center>
            </div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$(document).ready(function() {
$("#modalHumano").draggable({
    handle: ".modal-header"
});
});
</script>