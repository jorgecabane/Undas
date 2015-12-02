<?php
include_once dirname(dirname(__FILE__)) . '/querys/getBugs.php';//conexion local
include_once dirname(dirname(__FILE__)) . '/querys/getTM.php';//geTM
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

 $TM= getTecnologo($bug['tm_idTM']);
 foreach($TM as $dato)
 {
 	  	  echo	"<td>$dato[Nombre]";
 	  	 echo " ";
 	  	 echo "$dato[Apellido]</td>";
 }
       
          echo "<td>$bug[Titulo]</td>
                <td>$bug[Descripcion]</td>
                <td>$bug[fecha]</td>
             </tr>";
    }
}
echo "  </tbody>
      </table>  ";
?>
