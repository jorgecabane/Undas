<center>
	<section class="productList">
		</head>
		<body>
			<div align="center">
            <?php
												include_once "../include/isAdmin.php";
												
												if ($_SESSION ["usuario"]) {
													if (isAdmin ( $_SESSION ["idusuario"] ) == 1) {
														$admin = 1;
													} else {
														$admin = 0;
													}
												}
												
												$resultado = mysql_query ( "SELECT ValorHora.Valor as Valor, ValorHora.Semana as Semana, Centro.Nombre as Centro from TM inner join ValorHora on TM.idTM = ValorHora.Tm_idTM inner join Centro on Centro.idCentro = ValorHora.Centro_idCentro Where TM.Rut=$rut" ) or die ( mysql_error () );
												
												if ($resultado) {
													
													echo "<table id='t01'class='table table-hover table-bordered table-condensed'>";
													echo "<thead><tr>";
													echo "<th>Centro</th>";
													echo "<th>Cobro</th>";
													echo "<th>Semana/Sabado</th>";
													if ($admin == 1) {
														echo "<th>Editar</th>";
														echo "<th>Eliminar</th></tr>";
													}
													echo "</thead><tbody>";
													while ( $row = mysql_fetch_array ( $resultado ) ) {
														
														echo "<tr>";
														echo "<td>" . $row ['Centro'] . "</td>";
														?>
														<td>
					<div class="form-group">
						<input type="text" class="form-control" name="Mail"
							value="<?php echo $row['Valor'];?>"
							<?php if($admin==0){ echo "disabled='disabled'";       }?>
							required>

					</div>
				</td>
							 <?php
														
														
														
														
														if ($row ['Semana'] == 1) {
															echo "<td> Semana </td>";
														} else {
															
															echo "<td> Sabado </td>";
														}
														if ($admin == 1) {
															?>
<td>
					<form action="edit.php" method="post">
						<input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
						<input type="submit" value="Editar" class='btn btn-info	' />
					</form>
				</td>
				<td>
					<form action="delete.php" method="post">
						<input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
						<input type="submit" value="Eliminar" class='btn btn-danger' />
					</form>
				</td>
<?php
														}
														
														echo "</tr>";
													}
													;
													echo "</tbody></table>";
												}
												;
												?>
	</div>
		</body>
	</section>
</center>

