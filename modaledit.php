<?php include('controlador/edit.php'); ?>
<!-- Editar -->
<div class="modal fade bd-example-modal-lg" id="edit_<?php echo $card['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form method="POST" enctype="multipart/form-data" action="controlador/edit.php?id=<?php echo $card['id']; ?>">

						<input type="hidden" id="id" name="id" value="<?php echo $card['id']; ?>">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="recipient-name" class="col-form-label">Titulo:</label>
							</div>
							<div class="form-group col-md-8">
								<input type="color" class="form-control" name="tituloColor" id="tituloColor" value="<?php echo $card['tituloColor']; ?>">
							</div>
						</div>
						<input type="text" style="color:<?php echo $card['tituloColor']; ?>" class="form-control" name="titulo" id="titulo" value="<?php echo $card['titulo']; ?>">
						<br>
						<br>

						<div class="row">
							<div class="form-group col-md-4">
								<label for="recipient-name" class="col-form-label">Descripcion:</label>
							</div>
							<div class="form-group col-md-8">
								<input type="color" class="form-control" name="descripColor" id="descripColor" value="<?php echo $card['descripColor']; ?>">
							</div>
						</div>

						<input type="text" style="color:<?php echo $card['descripColor']; ?>" class="form-control" name="descripcion" id="descripcion" value="<?php echo $card['descripcion']; ?>">

						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Imagen</label>
							<input type="file" accept="image/*" name="imagen" id="imagen"><span><?php echo $card['imagen']; ?></span>
						</div>

						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Medalla</label>
							<input type="file" accept="image/*" name="medalla" id="medalla"><span><?php echo $card['medalla']; ?></span>
						</div>

						<button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
						<?php
						if ($card['medalla'] != "") { ?>
							<button type="submit" name="accion" value="quitarMedalla" class="btn btn-info">Quitar Medalla</button>
						<?php } else { ?>
							
						<?php } ?>

						<button type="submit" name="accion" value="editar" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</button>

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