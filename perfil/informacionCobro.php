<center>
    <section class="productList">
        </head>
        <body>
            <div align="center">
                <?php
                include_once "../Include/isAdmin.php";
                include_once "../querys/getCentros.php";
                if ($_SESSION ["usuario"]) {
                    if (isAdmin($_SESSION ["idusuario"]) == 1) {
                        $admin = 1;
                    } else {
                        $admin = 0;
                    }
                }

                $resultado = mysql_query("SELECT valorhora.Valor as Valor, valorhora.Semana as Semana, centro.Nombre as Centro, tm.idTM as idTM from tm inner join valorhora on tm.idTM = valorhora.Tm_idTM inner join centro on centro.idCentro = valorhora.Centro_idCentro WHERE tm.Rut='$rut'") or die(mysql_error());

                if ($resultado) {
                    if ($admin == 1) {
                        ?>  <input type="submit" value="Agregar Cobro"
                               class='btn btn-info btncobro' />
                           <?php
                           }
                           echo "<table id='append' class='table table-hover table-bordered table-condensed'>";
                           echo "<thead><tr>";
                           echo "<th>Centro</th>";
                           echo "<th>Cobro</th>";
                           echo "<th>Semana/Sabado</th>";
                           if ($admin == 1) {
                               echo "<th>Editar</th>";
                               echo "<th>Eliminar</th></tr>";
                           }
                           echo "</thead><tbody >";

                           while ($row = mysql_fetch_array($resultado)) {

                               echo "<tr>";
                               echo "<td class='centro'>" . $row ['Centro'] . "</td>\n";
                               ?>
                        <td>
                            <div class="form-group">
                                <input class='form-control editableCobro' type="text" name="cobro"
                                       value="<?php echo $row['Valor']; ?>"
                                       <?php
                                       if ($admin == 0) {
                                           echo "disabled='disabled'";
                                       }
                                       ?>
                                       required>

                            </div>
                        </td>
                        <?php
                        if ($row ['Semana'] == 1) {
                            echo "<td class='semana'>Semana</td>";
                        } else {

                            echo "<td class='semana'>Sabado</td>";
                        }
                        if ($admin == 1) {
                            ?>
                            <td><input type="hidden" id="idTM" name="id"
                                       value="<?php echo $row['idTM']; ?>" /> <input type="submit"
                                       value="Editar" class='btn btn-info btneditable' disabled="disabled" />

                            </td>
                            <td><input type="submit" value="Eliminar"
                                       class='btn btn-danger btndelete' /></td>
                                <?php
                            }

                            echo "</tr>";
                        }

                        echo "</tbody></table>";
                    }
                    ?>
            </div>
        </body>
    </section>
</center>

<script>
    $(".editableCobro").keyup(function() {
//$(".btneditable").removeAttr("disabled");
//solo se buscan los elementos de la fila seleccionada
        var row = $(this).parent().parent().parent();

        row.find(".btneditable").removeAttr("disabled");
        row.addClass("danger");
    });

    $(".btneditable").click(function() {
        //solo se buscan los elementos de la fila seleccionada
        var row = $(this).parent().parent().parent();
        var input = row.find(".editableCobro");
        var centro = row.find(".centro");
        var semana = row.find(".semana");

        jQuery.ajax({
            method: "POST",
            url: "querys/updateCobro.php",
            data: {
                'valor': input.val(),
                'id': $("#idTM").val(),
                'semana': semana.html(),
                'centro': centro.html()

            },
            success: function(response)
            {
                $(".btneditable").attr("disabled", "disabled");
                semana.parent()
                        .removeClass("danger")
                        .addClass("success");
            }//success
        });//ajax
    });//click .btneditable
</script>


<script>

    $(".btndelete").click(function() {


        var centro =
                $(this)
                .parent()
                .parent()
                .find(".centro")
                .html();

        var input =
                $(this)
                .parent()
                .parent()
                .find(".editableCobro")
                .val();

        var semana =
                $(this)
                .parent()
                .parent()
                .children(".semana")
                .html();

        var r = confirm("Esta seguro que quiere eliminar la fila: " + centro + " valor: " + input + "?");
        if (r == true) {
            var borrar = $(this).parent().parent();
            jQuery.ajax({
                method: "POST",
                url: "querys/eraseCobro.php",
                data: {
                    'valor': input,
                    'id': $("#idTM").val(),
                    'semana': semana,
                    'centro': centro
                },
                success: function(response)
                {
                    borrar.remove();
                }
            });
        }


    });

</script>
<script>

    $(".btncobro").click(function() {
        var content = "<tr><td><select class='form-control Centro' required name='Centro'>";
        content += "<option selected='true' disabled='disabled'> Seleccione Centro </option><?php
                    foreach (getCentros() as $centro) {
                        echo "<option value='" . $centro ["idCentro"] . "'> " . $centro ["Nombre"] . "    <b>(" . $centro ["Siglas"] . ")</b> </option>";
                    }
                    ?>";
        content += "</select></td>";
        content += "	<td> <input class='form-control ValorCobro' type='text' name='cobro' placeholder='Ingrese Cobro'> </td>";
        content += "<td><select class='form-control Semana' required name='Semana'>";
        content += "<option value='1'> Semana </option>";
        content += "<option value='0'> Sabado </option>";
        content += "</select></td>";
        content += "<td><input type='submit' value='Guardar' class='btn btn-info btnguardar' /></td>";
        content += "<td><input type='submit' value='Cancelar' class='btn btn-danger btncancelar' /></td></tr>";
        $('#append').prepend(content);
        $(".btncancelar").bind('click', function() {
            $(this).parent().parent().remove();
        });

        $(".btnguardar").bind('click', function() {
            $(this).parent().parent().find('.btnguardar').attr("value", "Guardado Exitoso");
            $(this).parent().parent().find('.btnguardar').attr("disabled", "disabled");
            $(this).parent().parent().find('.btnguardar').attr("class", "btn btn-success btnguardar");
            $(this).parent().parent().find('.btncancelar').attr("disabled", "disabled");
            var select = $(this).parent().parent().find('.Centro');
            var input = $(this).parent().parent().find('.ValorCobro');
            var inputsemana = $(this).parent().parent().find('.Semana');
            var idCentro = $(this).parent().parent().find(".Centro").val();
            var cobro = $(this).parent().parent().find(".ValorCobro").val();
            var semana = $(this).parent().parent().find(".Semana").val();
            jQuery.ajax({
                method: "POST",
                url: "querys/insertCobro.php",
                data: {
                    "idCentro": idCentro,
                    "cobro": cobro,
                    "semana": semana,
                    "idTM": "<?php echo $rut; ?>"
                },
                success: function(response)
                {
                    select.attr("disabled", "disabled");
                    input.attr("disabled", "disabled");
                    inputsemana.attr("disabled", "disabled");
                }
            });
        });
    });

</script>