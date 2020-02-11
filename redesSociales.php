<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/tipouser.php');
include('controlador/aRedesSociales.php');
?>
<section class="section-agents section-t8 adminSection">
    <div class="container">


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Redes sociales
        </button>

        <br>
        <br>

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
                                <label for="recipient-name" class="col-form-label">Url de la red social:</label>
                                <input type="text" class="form-control" id="urlSocial" name="urlSocial">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Imagen:</label>
                                <input type="file" accept="image/*" id="imagenRS" name="imagenRS">
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="agregarRed" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <?php
        $sentencia = $pdo->prepare("SELECT * FROM `redesSociales`");
        $sentencia->execute();
        $redSocial = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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
                        <th scope="col">Url de red social</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($redSocial as $rs) { ?>
                        <tr>
                            <th scope="row"><?php echo ++$i; ?></th>
                            <td><?php echo $rs['url']; ?></td>
                            <td><img class="img-thumbnail" width="50px" src="img/redesSociales/<?php echo $rs['imagenSocial']; ?>" /></td>

                            <td>

                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $rs['id']; ?>">
                                    <button type="submit" name="accion" value="verRedSocial" class="btn btn-success btn-sm">Editar</button>
                                    <button type="submit" name="accion" value="eliminarRedSocial" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>

        <!-- Modal -->
        <div class="modal fade" id="modalRedSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="recipient-name" class="col-form-label">Url de la red social:</label>
                                <input type="text" class="form-control" id="urlSocial" name="urlSocial" value="<?php echo $urlSocial ?>">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Imagen</label>
                                <?php if ($imagenRS != "") { ?>
                                    <br />
                                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="img/redesSociales/<?php echo $imagenRS; ?>">
                                    <br />
                                <?php } ?>
                                <input type="file" class="form-control" accept="image/*" name="imagenRS" value="<?php echo $imagenRS; ?>"><span><?php echo $imagenRS; ?></span>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="actualizarRedSocial" class="btn btn-primary">Guardar cambios</button>
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
        $('#modalRedSocial').modal('show');
    </script>
<?php } ?>