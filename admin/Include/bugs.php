<?php
include_once dirname(dirname(__FILE__)) . '/querys/getBugs.php';//conexion local
include_once dirname(dirname(__FILE__)) . '/querys/getTM.php';//getTM
include_once dirname(dirname(__FILE__)) . '/querys/getEmpresa.php';//getEmpresa
echo '<div class="table-responsive">';
echo "<table class='table table-condensed table-bordered table-hover'>
        <thead>
            <tr>
                <th>Informante</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha</th>
            </tr>
        </thead>";

echo "<tbody>";
$bugs = getBugs();
if ($bugs) {
    foreach($bugs as $bug){
    	echo "<tr>";
if($bug['tm_idTM']!=NULL){
 $TM= getTecnologo($bug['tm_idTM']);
 foreach($TM as $dato)
 {
 	  	 echo  "<td>$dato[Nombre]";
 	  	 echo  " ";
 	  	 echo  "$dato[Apellido]</td>";
 }
} // en caso de que row sea de un Tm
else{
	$Empresa= getEmpresaAdmin($bug['empresa_idEmpresa']);
	foreach($Empresa as $datoEmpresa)
	{
		echo  "<td>$datoEmpresa[Nombre]";
	}
} //en caso de que row sea de una empresa
          echo "<td>$bug[Titulo]</td>
                <td>$bug[Descripcion]</td>
                <td>$bug[fecha]</td>
             </tr>";
    } // for each de los bugs

    } // Si es que hay Bugs
echo "</tbody>
      </table></div>";
?>
