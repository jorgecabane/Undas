<center>
	<section class="productList">
		</head>
		<body>
			<div align="center">
            <?php
            include_once "../include/isAdmin.php";
            session_start();
            if ($_SESSION ["usuario"]) {
            	if (isAdmin ( $_SESSION ["idusuario"] ) == 1) {
            		$admin = 1;
            	} else {
            		$admin = 0;
            	}
            }

$resultado = mysql_query("SELECT * from TM Where Rut=$rut") or die(mysql_error());

if ($resultado) {
													
													echo "<table id='t01' class='table table-hover table-bordered'>";
													echo "<thead><tr>";
													echo "<th>Nombre</th>";
													echo "<th>Apellido</th>";
													echo "<th>Rut</th>";
													echo "<th>Mail</th>";
													echo "<th>Celular</th>";
													if($admin==1){
													echo "<th>Editar</th>";
													echo "<th>Eliminar</th>";
															}
															echo "</thead><tbody>";
													while ( $row = mysql_fetch_array ( $resultado ) ) {
														?>
														
														<form role="form" action="querys/updateTm.php" method="GET">
					<tr>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="Nombre"
									value="<?php echo $row['Nombre'];?>" 
									<?php if($admin==0){ echo "disabled='disabled'";       }?>
									required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="Apellido"
									value="<?php echo $row['Apellido'];?>" 
									<?php if($admin==0){ echo "disabled='disabled'";       }?>
									required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="number" class="form-control" name="Rut"
									value="<?php echo $row['Rut'];?>" 
									<?php if($admin==0){ echo "disabled='disabled'";       }?>
									required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="Mail"
									value="<?php echo $row['Mail'];?>"
									<?php if($admin==0){ echo "disabled='disabled'";       }?>
									 required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="number" class="form-control" name="Celular"
									value="<?php echo $row['Celular'];?>" 
									<?php if($admin==0){ echo "disabled='disabled'";       }?>
									required>
							</div>
						</td>
						<?php
							if($admin==1){
								?>
															
						<td>
							<div>
								<input type="hidden" name="id" value="<?php echo $row['idTM']; ?>" />
									 <input type="submit" value="Finalizar edicion" class='btn btn-info' disabled="disabled" />
							</div>
						</td>
				
				</form>
				</td>
				<td><a href="perfiles.php" class='btn btn-danger'>Eliminar</a></td>
				</tr> <?php }?>
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