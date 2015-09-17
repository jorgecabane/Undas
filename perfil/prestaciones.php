<?php 
session_start();
?>
<center>
    <section class="productList">
        </head>
        <body>
            <div align="center">
                <?php
                include_once "../Include/isAdmin.php";
                include_once "../querys/getPrestaciones.php";
                
                if ($_SESSION ["usuario"]) {
                    if (isAdmin($_SESSION ["idusuario"]) == 1) {
                        $admin = 1;
                       
                    } else {
                        $admin = 0;
                    }
                }
                $rut = $_POST['rut'];
                $empresa = $_POST['empresa'];
                             
                $prestaciones= getPrestaciones($rut,$empresa);
                if($prestaciones){
                foreach($prestaciones as $prestacion)
                {
                	echo'<div class="alert alert-warning" role="alert">';
                	echo '<strong>'. $prestacion['Grupo'] . ": " .$prestacion['Especifico']. '</strong>';
                	echo "</div>";
                }
                }
                else 
                {
                	echo'<div class="alert alert-warning" role="alert">';
                	echo '<strong>Error!</strong> No existen prestaciones asociadas por TM a Empresa';
                	echo "</div>";
                }
                
        ?>
            
                    
            </div>
        </body>
    </section>
</center>

