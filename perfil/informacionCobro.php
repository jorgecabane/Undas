<center>
    <section class="productList">
        </head>
        <body>
            <div align="center">
                <?php
                include_once "../Include/isAdmin.php";
                include_once "../querys/getEmpresa.php";
                include_once "../querys/getValorHora.php";
                if ($_SESSION ["usuario"]) {
                	if (isAdmin($_SESSION["idusuario"],$_SESSION ["context"]) == 1) {
                        $admin = 1;
                       
                    } else {
                        $admin = 0;
                    }
                }
                if ($admin == 1) {
             echo "<input type='submit' value='Agregar Honorario' class='btn btn-info btncobro' />";
                }
             echo "<div class='table-responsive'><table id='append' class='table table-hover table-bordered table-condensed'>";
             echo "<thead><tr>";
             echo "<th>Empresa</th>";
             echo "<th>Honorario</th>";
             echo "<th>Semana/Sabado</th>";
             if ($admin == 1) {
             	echo "<th>Editar</th>";
             	echo "<th>Eliminar</th></tr>";
             }
             echo "</thead><tbody >";
             if ($admin == 1) {
           
             echo "<div><br></div>";
             }
             
             $resultado = getValorHora($rut);
                if ($resultado) {
                    
                           

                           foreach ($resultado as $row) {
                           	$idTM=$row['idTM'];

                               echo "<tr>";
                               echo "<td class='centro'>" . $row ['Empresa'] . "</td>\n";
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
                            echo "<td><select class='form-control text-center semana'";  if ($admin == 0) { echo "disabled='disabled'";  } 
                            echo ">
                            
            		              <option value='1' class='default' selected> Semana </option>
            					  <option value='0' > Sabado </option>            		
            		              </td>";
                        } else {

                            echo "<td><select class='form-control text-center semana'";  if ($admin == 0) { echo "disabled='disabled'";  } 
                            echo ">
            		              <option value='0' class='default' selected> Sabado </option>
            					  <option value='1' > Semana </option>            		
            		              </td>";
                        }
                        if ($admin == 1) {
                            ?>
                            </select>
                            <td><input type="hidden" id="idTM" name="id"
                                       value="<?php echo $row['idTM']; ?>" /> <input type="submit"
                                       value="Editar" class='btn btn-info btneditable' disabled="disabled" />

                            </td>
                            <td><input type="submit" value="Eliminar" idEmpresa="<?php echo $row['idEmpresa']; ?>"
                                       class='btn btn-danger btndelete' /></td>
                                <?php
                            }

                            echo "</tr>";
                        }

                       
                    }
                    else {
                    	echo'<tr class="warning Oops"><td colspan="5">';
                    	echo '<strong>Oops!</strong> TM no tiene Honorarios asociados.';
                    	echo "</td></tr>";
                    }
                    echo "</tbody></table></div>";
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
    $(".semana").change(function() {
    	 var row = $(this).parent().parent();

         row.find(".btneditable").removeAttr("disabled");
         row.addClass("danger");
    	    });

    $(".btneditable").click(function() {
        //solo se buscan los elementos de la fila seleccionada
        var row = $(this).parent().parent();
        var input = row.find(".editableCobro");
        var centro = row.find(".centro");
        var semana = row.find(".semana");
        var semanaprevia = semana.find('.default');
       

        jQuery.ajax({
            method: "POST",
            url: "querys/updateCobro.php",
            data: {
                'valor': input.val(),
                'id': $("#idTM").val(),
                'semana': semana.val(),
                'semanaprevia': semanaprevia.val(),
                'empresa': centro.html()

            },
            success: function(response)
            {
                $(".btneditable").attr("disabled", "disabled");
                row   
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
                .find(".semana")
                .val();
        var idEmpresa = $(this).attr('idEmpresa');

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
                    'empresa': idEmpresa
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
        content += "<option selected='true' disabled='disabled'> Seleccione Empresa </option><?php
                    foreach (getEmpresaNotSinTurno() as $empresa) {
                        echo "<option value='" . $empresa ["idEmpresa"] . "'> " . $empresa ["Nombre"]. "</option>";
                    }
                    ?>";
        content += "</select></td>";
        content += "<td> <input class='form-control ValorCobro' type='number' name='cobro' placeholder='Ingrese Honorario'> </td>";
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
            var idEmpresa = $(this).parent().parent().find(".Centro").val();
            var cobro = $(this).parent().parent().find(".ValorCobro").val();
            var semana = $(this).parent().parent().find(".Semana").val();
            var NombreEmpresa= $(this).parent().parent().find('.Centro :selected').text();
            var NombreSemana = $(this).parent().parent().find(".Semana :selected").text();
            var row = $(this).parent().parent(); //linea en la que se encuentra
            if(semana == 1){
            row.html('<td class="centro">'+NombreEmpresa+'</td><td><div class="form-group"><input class="form-control editableCobro" type="text" name="cobro" value="'+cobro+'" required></div></td><td><select class="form-control text-center semana"><option value="1" class="default" selected> Semana </option><option value="0" > Sabado </option> </select></td><td><input type="submit" value="Editar" class="btn btn-info btneditabletwo" disabled="disabled"/></td><td><input type="submit" value="Eliminar"class="btn btn-danger btndeletetwo"/></td>');
            }
            else{
            row.html('<td class="centro">'+NombreEmpresa+'</td><td><div class="form-group"><input class="form-control editableCobro" type="text" name="cobro" value="'+cobro+'" required></div></td><td><select class="form-control text-center semana"><option value="0" class="default" selected> Sabado </option> <option value="1" > Semana </option> </select> </td><td><input type="submit" value="Editar" class="btn btn-info btneditabletwo" disabled="disabled"/></td><td><input type="submit" value="Eliminar"class="btn btn-danger btndeletetwo"/></td>');
            }

            jQuery.ajax({
                method: "POST",
                url: "querys/insertCobro.php",
                data: {
                    "idEmpresa": idEmpresa,
                    "cobro": cobro,
                    "semana": semana,
                    "idTM": "<?php echo $rut; ?>"
                },
                success: function(response)
                {
                	  $('.Oops').remove();
                	  row.toggleClass('success');
                    //select.attr("disabled", "disabled");
                    //input.attr("disabled", "disabled");
                   // inputsemana.attr("disabled", "disabled");
                }
            });

            $(".btndeletetwo").click(function() {
                var centro = $(this).parent().parent().find(".centro").text();
                var input  = $(this).parent().parent().find(".editableCobro").val();
                var semana = $(this).parent().parent().find(".semana").val();
                var r = confirm("Esta seguro que quiere eliminar la fila: " + centro + " valor: " + input + "?");
                if (r == true) {
                    var borrar = $(this).parent().parent();
                    jQuery.ajax({
                        method: "POST",
                        url: "querys/eraseCobro.php",
                        data: {
                            'valor': input,
                            'semana': $.trim(semana),
                            'empresa': idEmpresa,
                            'id': <?php if(isset($idTM)){echo $idTM;} else { echo '0';} ?>
                        },
                        success: function(response)
                        {
                            borrar.remove();
                        }
                    });
                }


            });

            $(".editableCobro").keyup(function() {
            	//$(".btneditable").removeAttr("disabled");
            	//solo se buscan los elementos de la fila seleccionada
            	        var row = $(this).parent().parent().parent();

            	        row.find(".btneditabletwo").removeAttr("disabled");
            	        row.addClass("danger");
            	    });

            $(".semana").change(function() {
           	 var row = $(this).parent().parent();

                row.find(".btneditabletwo").removeAttr("disabled");
                row.addClass("danger");
           	    });

            	    $(".btneditabletwo").click(function() {
            	        //solo se buscan los elementos de la fila seleccionada
            	        var row = $(this).parent().parent();
            	        var input = row.find(".editableCobro");
            	        var centro = row.find(".centro");
            	        var semana = row.find(".semana");
            	        var semanaprevia = semana.find('.default');

            	        jQuery.ajax({
            	            method: "POST",
            	            url: "querys/updateCobro.php",
            	            data: {
            	                'valor': input.val(),
            	                'id': <?php if(isset($idTM)){echo $idTM;} else { echo '0';} ?>,
            	                'semana': $.trim(semana.val()),
            	                'empresa': $.trim(centro.html()),
            	                'semanaprevia' : semanaprevia.val()

            	            },
            	            success: function(response)
            	            {
            	                $(".btneditabletwo").attr("disabled", "disabled");
            	                row   
            	                     .removeClass("danger")
            	                     .addClass("success");
            	            }//success
            	        });//ajax
            	    });//click .btneditable
        });
    });

</script>