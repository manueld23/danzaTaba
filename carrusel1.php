<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/tipouser.php');
include('controlador/aCarrusel1.php');
?>
<section class="section-agents section-t8 adminSection">
  <div class="container">

  
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar imagen
    </button>

    <br>
    <br>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#cambiar").click(function() {
          var color_letra = $("#tituloCC").val();
          $("#tituloC").css({
            'color': color_letra
          });
          var numeroC = $("#numeroCC").val();
          $("#numeroC").css({
            'color': numeroC
          });
          var numeroDCC = $("#numeroDCC").val();
          $("#numerodosC").css({
            'color': numeroDCC
          });
          var subtituloCC = $("#subtituloCC").val();
          $("#subtituloC").css({
            'color': subtituloCC
          });
          var subtituloDCC = $("#subtituloDCC").val();
          $("#subtitulodosC").css({
            'color': subtituloDCC
          });
        });
      });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Imagenes al carrusel 1</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <select id="tituloCC" name="tituloCC">
                  <option value="">Color</option>
                  <option value="#FFFFFF"> Blanco </option>
                  <option value="#000000"> Negro </option>
                  <option value="#0000FF"> Azul </option>
                  <option value="#FF0000"> Rojo </option>
                  <option value="#009900"> Verde </option>
                  <option value="#FF9900"> Naranja </option>
                  <option value="#FF99FF"> Violeta </option>
                </select>
                <input type="text" class="form-control" id="tituloC" name="tituloC">
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Lugar:</label>
                  <select id="numeroCC" name="numeroCC">
                    <option value="">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="text" class="form-control" id="numeroC" name="numeroC">
                </div>
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Fecha:</label>
                  <select id="numeroDCC" name="numeroDCC">
                    <option value="">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="date" class="form-control" id="numerodosC" name="numerodosC">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Evento:</label>
                  <select id="subtituloCC" name="subtituloCC">
                    <option value="">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="text" class="form-control" id="subtituloC" name="subtituloC">
                </div>
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Opcional:</label>
                  <select id="subtituloDCC" name="subtituloDCC">
                    <option value="">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="text" class="form-control" id="subtitulodosC" name="subtitulodosC">
                </div>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen:</label>
                <input type="file" accept="image/*" id="imagenC" name="imagenC">
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <input type="button" value="Cambiar color" id="cambiar" class="btn btn-info">
              <button type="submit" name="accion" value="agregarCarruel" class="btn btn-primary">Guardar cambios</button>
            </form>
          </div>

        </div>
      </div>
    </div>

    <?php
    $sentencia = $pdo->prepare("SELECT * FROM `carrusel1`");
    $sentencia->execute();
    $listaCarrusel = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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
    background-color: black;
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

    <div class="table table-resposive">
      <table class="rwd-table table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Lugar</th>
            <th scope="col">Fecha</th>
            <th scope="col">Evento</th>
            <th scope="col">Opcional</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; 
          foreach ($listaCarrusel as $carrusel) { ?>
            <tr>
              <th scope="row"><?php echo ++$i; ?></th>
              <td style="color:<?php echo $carrusel['tituloC']; ?>"><?php echo $carrusel['titulo']; ?></td>
              <td style="color:<?php echo $carrusel['numeroC']; ?>"><?php echo $carrusel['numero']; ?></td>
              <td style="color:<?php echo $carrusel['numeroDC']; ?>"><?php echo $carrusel['numerodos']; ?></td>
              <td style="color:<?php echo $carrusel['subtituloC']; ?>"><?php echo $carrusel['subtitulo']; ?></td>
              <td style="color:<?php echo $carrusel['subdosC']; ?>"><?php echo $carrusel['subdos']; ?></td>
              <td><img class="img-thumbnail" width="200px" src="img/carrusel/<?php echo $carrusel['imagen']; ?>" /></td>

              <td>

                <form action="" method="POST">
                  <input type="hidden" name="id" value="<?php echo $carrusel['id']; ?>">
                  <button type="submit" name="accion" value="editar" class="btn btn-success btn-sm">Editar</button>
                  <button type="submit" name="accion" class="btn btn-danger btn-sm" value="btnEliminar">Eliminar</button>
                </form>

              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="carrusel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar Imagenes del carrusel 1</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <select id="tituloCC" name="tituloCC">
                  <option value="<?php echo $tituloCC; ?>">Color</option>
                  <option value="white"> Blanco </option>
                  <option value="black"> Negro </option>
                  <option value="blue"> Azul </option>
                  <option value="red"> Rojo </option>
                  <option value="green"> Verde </option>
                  <option value="orange"> Naranja </option>
                  <option value="violet"> Violeta </option>
                </select>
                <input type="text" class="form-control" style="color: <?php echo $tituloCC; ?>" value="<?php echo $tituloC; ?>" id="tituloC" name="tituloC">
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Lugar:</label>
                  <select id="numeroCC" name="numeroCC">
                    <option value="<?php echo $numeroCC; ?>">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="text" class="form-control" style="color: <?php echo $numeroCC; ?>" value="<?php echo $numeroC; ?>" id="numeroC" name="numeroC">
                </div>
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Fecha:</label>
                  <select id="numeroDCC" name="numeroDCC">
                    <option value="<?php echo $numerodosCC; ?>">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="date" class="form-control" style="color: <?php echo $numerodosCC; ?>" value="<?php echo $numerodosC; ?>" id="numerodosC" name="numerodosC">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Evento:</label>
                  <select id="subtituloCC" name="subtituloCC">
                    <option value="<?php echo $subtituloCC; ?>">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="text" class="form-control" style="color: <?php echo $subtituloCC; ?>" value="<?php echo $subtituloC; ?>" id="subtituloC" name="subtituloC">
                </div>
                <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Opcional:</label>
                  <select id="subtituloDCC" name="subtituloDCC">
                    <option value="<?php echo $subtitulodosCC; ?>">Color</option>
                    <option value="white"> Blanco </option>
                    <option value="black"> Negro </option>
                    <option value="blue"> Azul </option>
                    <option value="red"> Rojo </option>
                    <option value="green"> Verde </option>
                    <option value="orange"> Naranja </option>
                    <option value="violet"> Violeta </option>
                  </select>
                  <input type="text" class="form-control" style="color: <?php echo $subtitulodosCC; ?>" value="<?php echo $subtitulodosC; ?>" id="subtitulodosC" name="subtitulodosC">
                </div>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Imagen</label>
                <?php if ($imagenC != "") { ?>
                  <br />
                  <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="img/carrusel/<?php echo $imagenC; ?>">
                  <br />
                  <br />
                <?php } ?>
                <input type="file" class="form-control" accept="image/*" name="imagenC" value="<?php echo $imagenC; ?>"><span><?php echo $imagenC; ?></span>
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              
              <button type="submit" name="accion" value="actualizarC" class="btn btn-primary">Actualizar</button>
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
    $('#carrusel').modal('show');
  </script>
<?php } ?>