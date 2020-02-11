<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/barraAdmin.php');
include('controlador/aBarra.php');
?>

<script>
    function enviar() {
        var color = document.getElementById('colorBarra').value;

        $.ajax({
            type: 'POST',
            url: 'aBarra.php',
            data: ('colorBarra=' + color),
            success: function(respuesta) {
                echo "color cambiado";
            }
        })
    }

    $(document).ready(function() {
        $('#div-btn1').click(function() {
            $('#barraAdmin').css('background-color', '#0a0808');
        });
    });
</script>

<section class="section-agents section-t8 adminSection">
    <div class="container">
        <!-- Button trigger modal 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar imagen
        </button>-->

        <form action="" method="POST">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-info" id="div-btn1" onclick="enviar()" name="accion" value="cambioColor">Cambiar color a la barra</button>
            <input type="color" name="colorBarra" value="<?php echo $color; ?>">
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
                                <input type="text" class="form-control" id="nombreB" name="nombreB">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Icono:</label>
                                <input type="file" accept="Iconos/*" id="iconoB" name="iconoB">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Seleccionado:</label>
                                <input type="file" accept="Iconos/*" id="seleccionadoB" name="seleccionadoB">
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="agregarIcono" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <?php
        $sentencia = $pdo->prepare("SELECT * FROM barra");
        $sentencia->execute();
        $listaMenu = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Seleccionado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($listaMenu as $menu) { ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $menu['nombre']; ?></td>
                        <td><img class="img-thumbnail" width="50px" src="iconos/iconosBarra/<?php echo $menu['icono']; ?>" /></td>
                        <td><img class="img-thumbnail" width="50px" src="iconos/iconosBarra/<?php echo $menu['seleccionado']; ?>" /></td>
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
                                <input type="text" class="form-control" id="nombreB" name="nombreB" value="<?php echo $nombreB; ?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Imagen</label>
                                <?php if ($iconoB != "") { ?>
                                    <br />
                                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="iconos/iconosBarra/<?php echo $iconoB; ?>">
                                    <br />
                                    <br />
                                <?php } ?>
                                <input type="file" class="form-control" accept="image/*" name="iconoB" value="<?php echo $iconoB; ?>"><span><?php echo $iconoB; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Icono seleccionado</label>
                                <?php if ($seleccionadoB != "") { ?>
                                    <br />
                                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="iconos/iconosBarra/<?php echo $seleccionadoB; ?>">
                                    <br />
                                    <br />
                                <?php } ?>
                                <input type="file" class="form-control" accept="image/*" name="selecionadoB" value="<?php echo $seleccionadoB; ?>"><span><?php echo $seleccionadoB; ?></span>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="actualizarB" class="btn btn-primary">Actualizar</button>
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