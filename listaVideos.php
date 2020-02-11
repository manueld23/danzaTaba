<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/barraAdmin.php');
include('aVideos.php');
?>

<section class="section-agents section-t8 adminSection">
    <div class="container">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar video +
        </button>
        <br>
        <br>

        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar videos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="aVideos.php" method="POST">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php
                                    $sentencia = $pdo->prepare("SELECT disciplina,titulo FROM disciplinas T1 WHERE NOT EXISTS (SELECT * FROM videos T2 WHERE T1.disciplina = T2.nombre)");
                                    $sentencia->execute();
                                    $disci = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <label for="message-text" class="col-form-label">Seleccione la disciplina:</label>

                                    <select class="form-control" name="titulo">
                                        <option value="" disabled selected>Disciplinas....</option>
                                        <?php foreach ($disci as $di) { ?>
                                            <option value="<?php echo $di['titulo'] ?>"><?php echo $di['titulo']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">Seleccione la pagina</label>
                                    <select class="form-control" name="nombre" id="nombre">
                                        <option value="" disabled selected>Pagina...</option>
                                        <?php foreach ($disci as $d) { ?>
                                            <option value="<?php echo $d['disciplina'] ?>"><?php echo $d['disciplina']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 1:</label>
                                    <input type="url" class="form-control" id="video" name="video">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 2:</label>
                                    <input type="url" class="form-control" id="video2" name="video2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 3:</label>
                                    <input type="url" class="form-control" id="video3" name="video3">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 4:</label>
                                    <input type="url" class="form-control" id="video4" name="video4">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 5:</label>
                                    <input type="url" class="form-control" id="video5" name="video5">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 6:</label>
                                    <input type="url" class="form-control" id="video6" name="video6">
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="agregarVideo" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
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

        <?php
        $sentencia = $pdo->prepare("SELECT * FROM videos");
        $sentencia->execute();
        $listaVideos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="table table-resposive">
            <table class="rwd-table table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">video1</th>
                        <th scope="col">video2</th>
                        <th scope="col">video3</th>
                        <th scope="col">video4</th>
                        <th scope="col">video5</th>
                        <th scope="col">video6</th>
                        <th scope="col">Nombre pagina</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($listaVideos as $videos) { ?>
                        <tr>
                            <th scope="row"><?php echo ++$i; ?></th>
                            <td><?php echo $videos['titulo']; ?></td>
                            <td><?php echo $videos['descripcion']; ?></td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $videos['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $videos['video2']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $videos['video3']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $videos['video4']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $videos['video5']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $videos['video6']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </td>
                            <td><?php echo $videos['nombre']; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $videos['id']; ?>">
                                    <button type="submit" name="accion" value="verVideo" class="btn btn-success btn-sm">Editar</button>
                                    <button type="submit" name="accion" value="eliminarVideo" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>


        <div class="modal fade bd-example-modal-lg" id="editarVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Titulo:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">Nombre de la pagina:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" maxlength="10" placeholder="Solo agregue una palabra" pattern="[A-Za-z0-9]+">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 1:</label>
                                    <input type="url" class="form-control" id="video" name="video" value="<?php echo $video; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 2:</label>
                                    <input type="url" class="form-control" id="video2" name="video2" value="<?php echo $video2; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 3:</label>
                                    <input type="url" class="form-control" id="video3" name="video3" value="<?php echo $video3; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 4:</label>
                                    <input type="url" class="form-control" id="video4" name="video4" value="<?php echo $video4; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 5:</label>
                                    <input type="url" class="form-control" id="video5" name="video5" value="<?php echo $video5; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="message-text" class="col-form-label">video 6:</label>
                                    <input type="url" class="form-control" id="video6" name="video6" value="<?php echo $video6; ?>">
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="actualizarVideo" class="btn btn-primary">Actualizar</button>
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
        $('#editarVideo').modal('show');
    </script>
<?php } ?>