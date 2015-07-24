<center>
	<section class="productList">







		</head>
		<body>
			<div align="center">
            <?php
												$resultado = mysql_query ( "SELECT * from TM Where idTM=$id" ) or die ( mysql_error () );
												
												if ($resultado) {
													
													echo "<table id='t01' class='table table-hover table-bordered'>";
													echo "<thead><tr>";
													echo "<th>Nombre</th>";
													echo "<th>Apellido</th>";
													echo "<th>Rut</th>";
													echo "<th>Mail</th>";
													echo "<th>Celular</th>";
													echo "<th>Editar</th>";
													echo "<th>Cancelar</th></thead><tbody>";
													while ( $row = mysql_fetch_array ( $resultado ) ) {
														?>
														
														<form role="form" action="querys/updateTm.php"
					method="POST">
					<tr>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="Nombre"
									value="<?php echo $row['Nombre'];?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="Apellido"
									value="<?php echo $row['Apellido'];?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="number" class="form-control" name="Rut"
									value="<?php echo $row['Rut'];?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="Mail"
									value="<?php echo $row['Mail'];?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="number" class="form-control" name="Celular"
									value="<?php echo $row['Celular'];?>" required>
							</div>
						</td>
						<td>
							<div>
								<input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
									 <input type="submit" value="Finalizar edicion" class='btn btn-info' />
							</div>
						</td>
				
				</form>
				</td>
				<td><a href="perfiles.php" class='btn btn-danger'>Cancelar</a></td>
				</tr>
					<?php
													}
													?>

					</tbody>
				</table>
					<?php
												}
												?>
			
			</div>
		</body>
	</section>
</center>