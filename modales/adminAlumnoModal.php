<?php include('../controlador/aAdminAlumModal.php');

$sentencia2 = $pdo->prepare("SELECT id,disciplina,titulo FROM `disciplinas`");
$sentencia2->execute();
$discipl = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Editar -->
<div class="modal fade bd-example-modal-lg" id="edit_<?php echo $alum['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">Editar card</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" enctype="multipart/form-data" action="../controlador/aAdminAlumModal.php?id=<?php echo $alum['id']; ?>">

						<input type="hidden" id="id" name="id" value="<?php echo $alum['id']; ?>">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="recipient-name" class="col-form-label">Titulo:</label>
								<input type="text" class="form-control" id="nombreAlum" name="nombreAlum" value="<?php echo $alum['nombre']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="recipient-name" class="col-form-label">Apellido paterno:</label>
								<input type="text" class="form-control" id="apPaternoAlum" name="apPaternoAlum" value="<?php echo $alum['apPaterno']; ?>">
							</div>

						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="recipient-name" class="col-form-label">Apellido materno:</label>
								<input type="text" class="form-control" id="apMaternoAlum" name="apMaternoAlum" value="<?php echo $alum['apMaterno']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="recipient-name" class="col-form-label">Disciplinas:</label>
								<select name="discipAlum" id="discipAlum" class="form-control">
									<?php foreach ($discipl as $da) { ?>
										<option value="<?php echo $da['id'];?>"><?php echo $da['titulo'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
						<button type="submit" name="accion" value="adminAlumnoEditar" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $card['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">Borrar miembro</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="text-center">¿Estas seguro en borrar los datos de?</p>
				<h2 class="text-center"><?php echo $card['titulo']; ?></h2>
			</div>
			<div class="modal-footer">
				<form action="controlador/edit.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $card['id']; ?>">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
					<button type="submit" name="accion" value="eliminar" class="btn btn-danger"><span class="fa fa-trash">si</span></button>
				</form>
			</div>

		</div>
	</div>
</div>