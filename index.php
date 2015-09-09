<?php
session_start();
include "header.php";
include "include/verificacionUsuario.php";
?>
<div class="container-fluid well">
    <div class="row">
        <div class="col-sm-6 panel panel-info">
            <div class="panel-heading"><h3>Titulo del Widget</h3></div>
            <div class="panel-body row-fluid">
                <div class="col-sm-12 well well-sm well-titles">
                    <form class="form-inline text-center">
                        <div class="form-group">
                            <label for="from">Inicio</label>
                            <input class="form-control" type="text" id="start" name="from">
                            <label for="to">Final</label>
                            <input class="form-control" type="text" id="end" name="to">
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 well well-sm">
                    grafico
                </div>
            </div>

        </div>
        <div class="col-sm-6 well well-sm">otro widget</div>
    </div>
</div>



</body>
<script>
  $(function() {
    $( "#start" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#end" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#end" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#start" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
</html>