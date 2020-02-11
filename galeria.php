<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/barraAdmin.php');
include('aVideos.php');
?>

<section class="section-agents section-t8">
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
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="agregarVideo" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="videoUnico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>

        <ul class="galeriaImagenes">
            <li class="galeriaImg"><img src="img/disciplinas/1572998968_72656119_2112083095557932_2923565847337238528_n.jpg" class="galeriIm"></li>
            <li class="galeriaImg"><img src="img/disciplinas/1572998978_30707282_1342345439198372_6270697001424257024_n.jpg" class="galeriIm"></li>
            <li class="galeriaImg"><img src="img/disciplinas/1572999143_60851608_1879509468815297_4740735723949260800_n.jpg" class="galeriIm"></li>
            <li class="galeriaImg"><img src="img/carrusel/1572999075_30724557_1342345662531683_6652039863371563008_n.jpg" class="galeriIm"></li>
        </ul>

        <?php
        $sentencia = $pdo->prepare("SELECT videos.titulo, videosDisciplinas.videoUrl FROM videos, videosDisciplinas WHERE videosDisciplinas.videosV = videos.id");
        $sentencia->execute();
        $listaVideos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <style>
            * {
                box-sizing: border-box;
            }

            .section-agents {
                margin: 0;
                background: #111;
            }

            .galeriIm {
                display: block;
                max-width: 100%;
            }

            .galeriaImagenes {
                padding: 20px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;

            }

            .galeriaImg:hover {
                width: 80%;
                cursor: pointer;
                display: block;
                
            }

            @media (min-width:480px) {
                .galeriaImg {
                    width: 48%;
                    margin: 5px;
                }
            }

            @media (min-width:768px) {
                .galeriaImg {
                    width: 33%;
                }
            }

            @media (min-width:1024px) {
                .galeriaImg {
                    width: 20%;
                    margin: 15px;
                }
            }

            .listaVideos {
                border: solid;
            }
        </style>


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
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="actualizarVideo" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="videoUnico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="aVideos.php" method="POST">
                            <input type="text" id="id" name="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">URL del video:</label>
                                    <input type="text" class="form-control" id="video" name="video">
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="videosDisciplinas" class="btn btn-primary">Actualizar</button>
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
<?php } elseif ($modalUnicoVideo) { ?>
    <script>
        $('#videoUnico').modal('show');
    </script>
<?php } ?>