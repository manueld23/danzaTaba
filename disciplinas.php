<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/tipouser.php');
include('controlador/aDisciplinas.php');

?>
<section class="section-agents section-t8 adminSection">

  <div class="container">

    <h1>Disciplinas</h1> <br>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Agregar disciplina</button>
    <br>
    <br>

    <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Agregar disciplina</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">

              <div class="row">

                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Pagina:</label>
                  <input type="text" class="form-control" maxlength="10" name="disciplina" id="disciplina" placeholder="Solo agregue una palabra" pattern="[A-Za-z0-9]+">
                </div>
                <div class="form-group col-md-6">
                  <label for="message-text" class="col-form-label">Titulo:</label>
                  <input type="text" class="form-control" name="titulo" id="titulo">
                </div>

              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                <textarea type="text" class="form-control" name="descripcion" id="descripcion"></textarea>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Imagen</label>
                <input type="file" class="form-control" accept="image/*" name="imagen">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="accion" value="btnAgregar" class="btn btn-primary">Guardar cambios</button>
          </div>
          </form>
        </div>
      </div>
    </div>

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

      @media screen and (max-width: 600px) {
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

    <?php
    $sentencia = $pdo->prepare("SELECT * FROM `disciplinas`");
    $sentencia->execute();
    $listaImagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="table table-resposive">
      <table class="rwd-table table table-hover table-bordered" width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Disciplina</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0;
          foreach ($listaImagenes as $disc) { ?>
            <tr>
              <th scope="row"><?php echo ++$i; ?></th>
              <td><?php echo $disc['disciplina']; ?></td>
              <td><?php echo $disc['titulo']; ?></td>
              <td><?php echo $disc['descripcion']; ?></td>
              <td><img class="img-thumbnail" width="150px" src="img/disciplinas/<?php echo $disc['imagen']; ?>" /></td>

              <td>

                <form action="" method="POST">
                  <input type="hidden" name="id" value="<?php echo $disc['id']; ?>">
                  <input type="submit" name="accion" value="editar" class="btn btn-success btn-sm" name="accion">
                  <button type="submit" name="accion" class="btn btn-danger btn-sm" value="btnEliminar">Eliminar</button>
                </form>

              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <br>
  </div>


  <div class="modal fade bd-example-modal-lg" id="editCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Actualizar disciplinas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="" enctype="multipart/form-data">

            <div class="row">
              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">

              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Disciplina:</label>
                <input type="text" class="form-control" name="disciplina" id="disciplina" value="<?php echo $disciplina; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="message-text" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Descripcion</label>
              <textarea type="text" class="form-control" id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Imagen</label>
              <?php if ($imagen != "") { ?>
                <br />
                <img class="img-thumbnail rounded mx-auto d-block" width="150px" src="img/disciplinas/<?php echo $imagen; ?>">
                <br />
                <br />
              <?php } ?>
              <input type="file" accept="image/*" name="imagen"><span><?php echo $imagen; ?></span>
            </div>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="accion" value="btnActualizar" class="btn btn-primary">Actualizar</button>

          </form>
        </div>
      </div>
    </div>
  </div>

</section>

<?php include('cabecera/pie.php'); ?>

<?php if ($mostrarModal) { ?>
  <script>
    $('#editCard').modal('show');
  </script>
<?php } ?>