<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/barraAdmin.php');
include('controlador/aMenu.php');
?>
<section class="section-agents section-t8 adminSection">

  <div class="container">

  <h3>Modificacion del menu</h3>
    <!-- Button trigger modal 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar imagen
    </button>-->

    <form action="" method="POST">
      <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
      <button type="submit" class="btn btn-info" id="div-btn1" onclick="enviar()" name="accion" value="cambioMenu">Cambiar color al menu</button>
      <input type="color" name="menuColor" value="<?php echo $colorMenu; ?>">
    </form>

    <br>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Iconos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" id="nombreM" name="nombreM">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Icono:</label>
                <input type="file" accept="Iconos/*" id="iconoM" name="iconoM">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Icono Seleccionado:</label>
                <input type="file" accept="image/*" name="seleccionadoM">
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="accion" value="agregarIcono" class="btn btn-primary">Guardar cambios</button>
            </form>
          </div>

        </div>
      </div>
    </div>

    <?php
    $sentencia = $pdo->prepare("SELECT * FROM `menu`");
    $sentencia->execute();
    $listaMenu = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titulo</th>
          <th scope="col">Imagen</th>
          <th scope="col">Subtitulos</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0;
        foreach ($listaMenu as $menu) { ?>
          <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo $menu['nombre']; ?></td>
            <td><img class="img-thumbnail" width="50px" src="iconos/iconosMenu/<?php echo $menu['icono']; ?>" /></td>
            <td><img class="img-thumbnail" width="50px" src="iconos/iconosMenu/<?php echo $menu['seleccionado']; ?>" /></td>
            <td>

              <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $menu['id']; ?>">
                <input type="submit" name="accion" value="editar" class="btn btn-success" name="accion">
                <button type="submit" name="accion" class="btn btn-danger" value="btnEliminar">Eliminar</button>
              </form>

            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  <br>

    <!-- Modal -->
    <div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar Iconos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombreM" name="nombreM" value="<?php echo $nombreM; ?>">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Icono:</label>
                <?php if ($iconoM != "") { ?>
                  <br />
                  <img class="img-thumbnail rounded mx-auto d-block" width="70px" src="iconos/iconosMenu/<?php echo $iconoM; ?>">
                  <br /> 
                <?php } ?>
                <input type="file" class="form-control" accept="image/*" name="iconoM" value="<?php echo $iconoM; ?>"><span><?php echo $iconoM; ?></span>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Icono seleccionado:</label>
                <?php if ($seleccionadoM != "") { ?>
                  <br />
                  <img class="img-thumbnail rounded mx-auto d-block" width="70px" src="iconos/iconosMenu/<?php echo $seleccionadoM; ?>">
                  <br />
                <?php } ?>
                <input type="file" class="form-control" accept="image/*" name="seleccionadoM" value="<?php echo $seleccionadoM; ?>"><span><?php echo $seleccionadoM; ?></span>
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="accion" value="actualizarI" class="btn btn-primary">Actualizar</button>
            </form>
          </div>

        </div>
      </div>
    </div>

  </div>

</section>

<?php include('cabecera/pie.php'); ?>
<?php if ($mostrarModal) { ?>
  <script>
    $('#menu').modal('show');
  </script>
<?php } ?>