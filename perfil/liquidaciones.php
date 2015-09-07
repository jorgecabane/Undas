<div align="center">
    <?php
				include_once "../include/isAdmin.php";
				include_once "../include/meses.php";
				if ($_SESSION ["usuario"]) {
					if (isAdmin ( $_SESSION ["idusuario"] ) == 1) {
						$admin = 1;
					} else {
						$admin = 0;
					}
				}
				$mes = 9;
				
				$query = mysql_query ( "Select TM.Nombre as TMNombre, Tm.Apellido as TMApellido, Centro.Nombre as NombreCentro, MONTH(evento.HoraInicio) as Mes, Year(evento.HoraInicio) as Year,
				sum((TIME_TO_SEC(evento.HoraTermino)/3600)-time_to_sec(evento.HoraInicio)/3600) as Horas
				from evento
				inner join Ecos on (evento.Ecos_idEcos = Ecos.idEcos)
				inner join Centro on ( Ecos.Centro_idCentro= Centro.idCentro)
				inner join TM on (TM.idTM = evento.TM_idTM)
				where Tm.Rut = '$rut' and MONTH(evento.HoraInicio) = $mes
				group by NombreCentro, MES
				order by NombreCentro asc" ) or die ( mysql_error () );
				$resultado = mysql_fetch_assoc ( $query );
				var_dump ( $resultado );
				echo "<table id='t01' class='table table-hover table-bordered'>";
				echo "<thead><tr>";
				echo "<th>Fecha: ";
				echo Mes ( $resultado ['Mes'] );
				echo " " . $resultado ['Year'];
				echo " </th>";
				echo "</thead>";
				
				echo "<thead><tr>";
				echo "<th>TM: ";
				echo $resultado ['TMNombre'];
				echo " " . $resultado ['TMApellido'];
				echo " </th>";
				echo "</thead>";
				
				echo "<thead><tr>";
				
				echo "<th>Centro</th>";
				echo "<th>Horas Realizadas</th>";
				echo "</thead><tbody>";
				
				while ( $row = mysql_fetch_assoc ( $query ) ) {
					?>
				
				
				            <tr>
		<td>
			<div class="form-group">
				<p class="form-control-static" id="nombre"><?php echo $row['NombreCentro']; ?></p>
			</div>
		</td>
		<td>
			<div class="form-group">
				<input id="cupos" type="text" class="form-control editable"
					name="Cupos" value="<?php echo $row['Horas']; ?>"
					<?php
					
					if ($admin == 0) {
						echo "disabled='disabled'";
					}
					?>
					required>
			</div>
		</td>
	</tr>
						<?php
				}
				?>

			</tbody>
	</table>