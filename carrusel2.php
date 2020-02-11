<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/tipouser.php');
include('controlador/aCarrusel2.php');
?>

<section class="section-agents section-t8">

  <div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar imagen
    </button>

    <br>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Imagenes al carrusel 2</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">

              <input type="hidden" class="form-control" name="id" id="id">
              <div class="form-group">
                <label for="message-text" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Imagen</label>
                <input type="file" class="form-control" accept="image/*" name="imagen">
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="acciones" value="agregarCarrusel2" class="btn btn-primary">Agregar</button>

            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
    $sentencia = $pdo->prepare("SELECT * FROM `carrusel2`");
    $sentencia->execute();
    $listaImagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <style>
      .rwd-table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
      }

      .rwd-table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
      }

      .rwd-table tr {
        border: 1px solid #ddd;
        padding: .35em;
      }

      .rwd-table th,
      .rwd-table td {
        padding: .625em;
        text-align: center;
        font-size: 11px;
      }

      .rwd-table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      .rwd-table th {
        font-size: 11px;
      }

      @media screen and (max-width: 470px) {
        .rwd-table {
          border: 0;
        }

        .rwd-table caption {
          font-size: 1.3em;
        }

        .rwd-table thead {
          border: none;
          clip: rect(0 0 0 0);
          height: 1px;
          margin: -1px;
          overflow: hidden;
          padding: 0;
          position: absolute;
          width: 1px;
        }

        .rwd-table tr {
          border-bottom: 3px solid #ddd;
          display: block;
          margin-bottom: .625em;
        }

        .rwd-table td {
          border-bottom: 1px solid #ddd;
          display: block;
          font-size: .8em;
          text-align: right;
        }

        .rwd-table td::before {
          content: attr(data-label);
          float: left;
          font-weight: bold;
          text-transform: uppercase;
        }

        .rwd-table td:last-child {
          border-bottom: 0;
        }
      }
    </style>

    <div class="table table-resposive">
      <table class="rwd-table table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0;
          foreach ($listaImagenes as $disc) { ?>
            <tr>
              <th scope="row"><?php echo ++$i; ?></th>
              <td><?php echo $disc['titulo']; ?></td>
              <td><img class="img-thumbnail" width="200px" src="img/carrusel2/<?php echo $disc['imagen']; ?>" /></td>

              <td>
                <form action="" method="POST">
                  <input type="hidden" name="id" value="<?php echo $disc['id']; ?>">
                  <input type="submit" name="acciones" value="mostrar" class="btn btn-success btn-sm" name="accion">
                  <button type="submit" name="acciones" class="btn btn-danger btn-sm" value="btnEliminar">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- Editar -->
    <div class="modal fade" id="editarCarrusel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h4 class="modal-title" id="myModalLabel">Editar carrusel 2</h4>
            </center>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <form method="POST" action="" enctype="multipart/form-data">

              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
              <div class="form-group">
                <label for="message-text" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Imagen</label>
                <?php if ($imagen != "") { ?>
                  <br />
                  <img class="img-thumbnail rounded mx-auto d-block" width="150px" src="img/carrusel2/<?php echo $imagen; ?>">
                  <br />
                  <br />
                <?php } ?>
                <input type="file" class="form-control" accept="image/*" name="imagen" require="" value="<?php echo $imagen; ?>"><span><?php echo $imagen; ?></span>
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="acciones" value="actualizarCarrusel2" class="btn btn-primary">Actualizar</button>

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
    $('#editarCarrusel2').modal('show');
  </script>
<?php } ?>