<?php
include_once dirname(__FILE__) . "/../conexionLocal.php";
include_once dirname(__FILE__) . "/../querys/getEcosGroup.php";

?>


<div align="center" >
    <?php    
//while ($row = mysql_fetch_array($resultado)) {
    $datosCentro = getEcosGroup($idEmpresa);
foreach($datosCentro AS $Centro){
        ?>
        <table id='t01' class='table table-hover table-bordered'>
            <thead><tr>
                    <th>Nombre Centro</th>
                    <th>Siglas</th>
                    <?php
                    if ($admin == 1) {
                        echo "<th>Editar</th><th>Eliminar</th>";
                    }
                    ?>
            </thead><tbody>
                <tr idCentro="<?php echo $Centro['idCentro'];?>" class="trCentro">
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control editable" name="Nombre" value="<?php echo $Centro['Nombre']; ?>"
                            <?php
                            if ($admin == 0) {
                                echo "disabled='disabled'";
                            }
                            ?>
                                   required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control editable" name="Siglas" value="<?php echo $Centro['Siglas']; ?>"
                            <?php
                            if ($admin == 0) {
                                echo "disabled='disabled'";
                            }
                            ?>
                                   required>
                        </div>
                    </td>
                    <?php
                    if ($admin == 1) {
                        ?>
                        <td>
                            <div>
                                <input type="hidden" name="id" value="<?php echo $Centro['idCentro']; ?>" />
                                <input type="submit" value="Finalizar edicion"
                                       class='btn btn-info btneditcentro' disabled="disabled" />
                            </div>
                        </td>
                        </td>
                        <td><input type="submit" value="Eliminar TM"
                                   class='btn btn-danger btnerase'></td>
                    </tr> <?php } ?>
                </tr>
            <thead><tr>
                    <th>Nombres Ecos</th>
                    <th>Color</th>
            </thead><tbody>
            
        <?php	foreach ($Centro['Ecos'] as $dataEco) { 
                		?>
                    <tr idEco=<?php echo $dataEco['idEcos'];?> class="trEco">
                        <td>
                            <div class="form-group">
                                <input id="ecos" type="text" class="form-control editable" name="Ecos" value="<?php echo $dataEco['Nombre']; ?>"
                                <?php
                                if ($admin == 0) {
                                    echo "disabled='disabled'";
                                }
                                ?>
                                       required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="color" class="form-control editable" name="Siglas" value="<?php echo $dataEco['color']; ?>"
                                       <?php
                                       if ($admin == 0) {
                                           echo "disabled='disabled'";
                                       }
                                       ?>
                                       required>
                            </div>
                        </td>
                         <?php
                    if ($admin == 1) {
                        ?>
                        <td>
                            <div>
                                <input type="hidden" name="id" value="<?php echo $row['idCentro']; ?>" />
                                <input type="submit" value="Finalizar edicion"
                                       class='btn btn-info btnediteco' disabled="disabled" />
                            </div>
                        </td>
                        </td>
                        <td><input type="submit" value="Eliminar TM"
                                   class='btn btn-danger btnerase'></td>
                    </tr> <?php } ?>
                    </tr>
                    <?php
                }
			}	
            ?>
        </tbody>
    </table>
</div>
<script>
    $(".editable").keyup(function() {
        $(".btneditcentro").removeAttr("disabled");

        $(this)
                .parent()
                .parent()
                .parent()
                .addClass("danger");
    });
</script>
<script>
    $(".btneditcentro").click(function() {
    	row=$(this).find('.trCentro');
    	console.log(row);
       /* jQuery.ajax({
            method: "POST",
            url: "querys/updateCentro.php",
            data: {
                'nombre': $('#nombre').val(),
                'siglas': $('#siglas').val()
            },
            success: function(response)
            {
                $(".btneditcentro").attr("disabled", "disabled");
                $(".btneditcentro")
                        .parent()
                        .parent()
                        .parent()
                        .removeClass("danger")
                        .addClass("success");
            }
        });*/
    });
</script>
<script>
    $(".btnerase").click(function() {
        var r = confirm("Esta seguro que quiere eliminar a: " + $('#nombre').val() + "?");
        if (r == true) {
          /*  jQuery.ajax({
                method: "POST",
                url: "querys/eraseCentro.php",
                data: {
                    'nombre': $('#nombre').val()
                },
                success: function(response)
                {
                    location.reload();
                }
            });*/
        }
    });
</script>
