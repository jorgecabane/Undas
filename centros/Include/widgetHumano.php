<div id="map" style="position:relative; width:403px; height:664px; z-index:0; background-image:url(images/prestaciones.jpg); background-repeat: no-repeat;">
    <select class="form-control" id="empresas" style="position:absolute;top:5px;left:255px; width:200px;" disabled>
        <?php
        echo "<option value='$_SESSION[idusuario]'>$_SESSION[usuario]</option>";
        ?>
    </select>
    <a class="popovereable" id="map-link-2" href="#" shape="circle"
       title="Cervical" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:87px;left:195px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-3" href="#" shape="square"
       title="Ecotomografía de Cerebro" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:23px;left:195px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-4" href="#" shape="square"
       title="Tiroides" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:107px;left:195px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-5" href="#" shape="square"
       title="Mamaria y Axilar" data-toggle="popover" data-trigger="focus" data-placement="right"
       style="position:absolute;top:155px;left:235px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-8" href="#" shape="square"
       title="Mano" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:318px;left:340px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>
    <a class="popovereable" id="map-link-8" href="#" shape="square"
       title="Hombro" data-toggle="popover" data-trigger="focus" data-placement="right"
       style="position:absolute;top:123px;left:260px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>
    <a class="popovereable" id="map-link-8" href="#" shape="square"
       title="Brazo" data-toggle="popover" data-trigger="focus" data-placement="right"
       style="position:absolute;top:179px;left:279px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>
    <a class="popovereable" id="map-link-8" href="#" shape="square"
       title="Codo y Antebrazo" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:222px;left:100px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>
    <a class="popovereable" id="map-link-8" href="#" shape="square"
       title="Muñeca" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:290px;left:52px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Muslo" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:370px;left:150px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Rodilla" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:460px;left:134px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Pierna" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:535px;left:120px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Tobillo" data-toggle="popover" data-trigger="focus" data-placement="top"
       style="position:absolute;top:600px;left:285px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Pie" data-toggle="popover" data-trigger="focus" data-placement="top"
       style="position:absolute;top:630px;left:298px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Cadera" data-toggle="popover" data-trigger="focus" data-placement="right"
       style="position:absolute;top:271px;left:234px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-9" href="#" shape="square"
       title="Testicular" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:315px;left:193px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-12" href="#" shape="square"
       title="Pelvis Masculina" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:288px;left:184px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-13" href="#" shape="square"
       title="Pelvis Femenina" data-toggle="popover" data-trigger="focus" data-placement="right"
       style="position:absolute;top:288px;left:200px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-15" href="#" shape="square"
       title="Inguinal" data-toggle="popover" data-trigger="focus" data-placement="left"
       style="position:absolute;top:308px;left:169px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-17" href="#" shape="square"
       title="Renal" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:215px;left:158px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>

    <a class="popovereable" id="map-link-18" href="#" shape="square"
       title="Abdominal" data-toggle="popover" data-trigger="focus" data-placement="bottom"
       style="position:absolute;top:240px;left:193px;width:10px;height:10px; border: 2px solid red;border-radius: 8px;">
    </a>
    <div style="position:absolute;top:36px;left: 0px;width:100px; height:50px; border:2px #ff00ff;color: red;">
        <center>
            <h5>Niños</h5>
            <span class="popovereable label label-danger label-block" id="map-link-20" title="Ecotomografias niños de 0 a 5 años" data-toggle="popover" data-trigger="focus" data-placement="bottom">0 a 5 años</span>
            <span class="popovereable label label-danger label-block" id="map-link-21" title="Ecotomografias niños de 5 a 10 años" data-toggle="popover" data-trigger="focus" data-placement="bottom">5 a 10 años</span>
        </center>
    </div>
    <div style="position:absolute;top:36px;left: 330px;width:120px; height:50px; border:2px #ff00ff;color: red;">
        <h5>Ecotomografías Doppler</h5>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Testicular" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Testicular
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Carotideo y Vertebral" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Carotideo y Vertebral
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Venoso de EEII" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Venoso EEII
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Venoso de EESS" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Venoso EESS
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Arterial de EEII" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Arterial EEII
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Arterial de EESS" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Arterial EESS
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Renal" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Renal
        </span>
        <span class="popovereable label label-danger label-block" id="map-link-21" title="Doppler Hepático" data-toggle="popover" data-trigger="focus" data-placement="bottom">
            Hepático
        </span>
    </div>
    <!--<area shape="circle" coords="580,127" alt="Mano" href="#" title="Prestaciones Mano" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
       <area shape="circle" coords="338,431,30" alt="Rodilla" href="#" title="Prestaciones Rodilla" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="321,321,30" alt="Pelvis" href="#" title="Prestaciones Pelvis" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="359,568,30" alt="Pie" href="#" title="Prestaciones Pie" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="177,138,30" alt="Codo" href="#" title="Prestaciones Codo" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="319,242,40" alt="Abdominal" href="#" title="Prestaciones Abdominal" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="351,162,30" alt="Mamaria" href="#"  title="Prestaciones Mamaria" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="317,112,30" alt="Cervical" href="#" title="Prestaciones Cervical" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="263,120,30" alt="Hombro" href="#" title="Prestaciones Hombro" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="499,133,30" alt="Antebrazo" href="#" title="Prestaciones Antebrazo" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="334,504,30" alt="Pierna" href="#" title="Prestaciones Pierna" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
      <area shape="circle" coords="289,363,30" alt="Muslo" href="#" title="Prestaciones Muslo" data-toggle="popover" data-trigger="focus" data-placement="bottom">
      <area shape="circle" coords="489,260,30" alt="Extras" href="#" title="Prestaciones Extras" data-toggle="popover" data-trigger="focus" data-placement="bottom" >
    -->
</div>

<script>
    $(".popovereable").each(function() {
        var especifico = $(this).attr('title');
        var idEmpresa = $('#empresas :selected').val();
        var objeto = $(this);


        $.ajax({
            method: "POST",
            url: "Include/getPrestacionesWidget.php",
            data: {
                'especifico': especifico,
                'idEmpresa': idEmpresa
            },
            success: function(response) {
                objeto.attr("data-content", response);
                //objeto.popover({"content": response});
            }
        });//ajax
    })
            .popover({
        html: true,
        animation: true,
        trigger: 'hover'
    });//popover


    $('#empresas').change(function() {
        $('#progress2').slideDown('slow');
        cant = $('.popovereable').size();
        aux = 0;
        $(".popovereable").each(function() {
            var especifico = $(this).attr('data-original-title');
            var idEmpresa = $('#empresas :selected').val();
            var objeto = $(this);


            $.ajax({
                method: "POST",
                url: "Include/getPrestacionesWidget.php",
                data: {
                    'especifico': especifico,
                    'idEmpresa': idEmpresa
                },
                success: function(response) {
                    objeto.attr("data-content", response);
                    aux++;
                    if (aux == cant) {
                        $('#progress2').slideUp('slow');
                    }
                }
            });//ajax
        })
                .popover({
            html: true,
            animation: true,
            trigger: 'hover'
        });//popover

    });

</script>
<script>
</script>