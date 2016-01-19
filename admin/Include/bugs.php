<?php
include_once dirname(dirname(__FILE__)) . '/querys/getBugs.php';//conexion local
include_once dirname(dirname(__FILE__)) . '/querys/getTM.php';//getTM
include_once dirname(dirname(__FILE__)) . '/querys/getEmpresa.php';//getEmpresa
echo "<table class='table table-condensed table-bordered table-hover' style='table-layout:fixed;'>
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
          echo "<td style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>$bug[Titulo]</td>
                <td><div style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;' data-toggle='popover' data-trigger='hover' title='$bug[Descripcion]' >$bug[Descripcion]</div></td>
                <td>$bug[fecha]</td>
             </tr>";
    } // for each de los bugs

    } // Si es que hay Bugs
echo "  </tbody>
      </table>  ";
?>
