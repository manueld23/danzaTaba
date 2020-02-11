<?php
require('cabecera/menu.php');
require('cabecera/barraUser.php');
require('controlador/aAlumno.php');
?>

<?php
$id = $_SESSION['id'];
//$sentencia = $pdo->prepare("SELECT * FROM alumnos WHERE id =1");
$sentencia = $pdo->prepare("SELECT DISTINCT alumnos.id,alumnos.nombre,alumnos.apPaterno,alumnos.apMaterno,
                                            alumnos.maestro,alumnos.numero,alumnos.imagenUsuario,
                                            alumnos.correo,alumnos.direccion,
                                            bailes.id,bailes.disciplina 
                            FROM alumnos 
                            INNER JOIN bailes ON alumnos.id = bailes.id 
                            WHERE alumnos.id =" . $id . "");
//$sentencia->bindParam(':id',$id);
$sentencia->execute();
//$alumno = $sentencia->fetch(PDO::FETCH_LAZY);
$alumno = $sentencia->fetchAll();
//$alumno = $sentencia->fetchAll(PDO::FETCH_ASSOC);
$id = "";
$nombre = "";
$paterno = "";
$materno = "";
$maestro = "";
$telefono = "";
$imagen = "";
$correo = "";
$direccion = "";
//$diciplina = "";

foreach ($alumno as $row) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    $paterno = $row["apPaterno"];
    $materno = $row["apMaterno"];
    $maestro = $row["maestro"];
    $telefono = $row["numero"];
    $imagen = $row["imagenUsuario"];
    $correo = $row["correo"];
    $direccion = $row["direccion"];
}
?>

<style>
    .perfil {
        border-radius: 20px;
        background-color: #FCF3E3;
    }

    .alumno {
        background-color: black;
    }

    .emp-profile {
        padding: 0%;
        margin-top: 3%;
        border-radius: 0.5rem;
        background: black;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #E4EDF6;
    }

    .profile-head h6 {
        color: #A6A8AA;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #E4EDF6;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #E4EDF6;
    }
</style>

<section class="section-agents section-t8 alumno">
    <div class="emp-profile">
        <div class="col-md-2">
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="accion" class="btn btn-danger" value="mostrarAlumno">Editar perfil</button>
            </form>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modalAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" value="<?php echo $nombreAlumno; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Ap Paterno:</label>
                                    <input type="text" class="form-control" id="apPaternoALumno" name="apPaternoALumno" value="<?php echo $apPaternoALumno; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Ap Materno:</label>
                                    <input type="text" class="form-control" id="apMaternoALumno" name="apMaternoALumno" value="<?php echo $apMaternoALumno; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">No. de telefono:</label>
                                    <input type="text" class="form-control" id="telefonoAlumno" name="telefonoAlumno" value="<?php echo $telefonoAlumno; ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="correoAlumno" name="correoAlumno" value="<?php echo $correoAlumno; ?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                <input type="text" class="form-control" id="direccionAlumno" name="direccionAlumno" value="<?php echo $direccionAlumno; ?>">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Imagen</label>
                                <?php if ($imagenAlumno != "") { ?>
                                    <br />
                                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="img/alumnos/<?php echo $imagenAlumno; ?>">
                                    <br />
                                <?php } ?>
                                <input type="file" class="form-control" accept="image/*" name="imagenAlumno" value="<?php echo $imagenAlumno; ?>"><span><?php echo $imagenAlumno; ?></span>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="actualizarAlumno" class="btn btn-primary">Actualizar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <?php

        ?>

        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="http://localhost/ejercicio4/img/alumnos/<?php echo $imagen; ?>" />
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php echo $nombre, " ", $paterno, " ", $materno; ?>
                    </h5>
                    <h6>
                        Alumno
                    </h6>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos Academicos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="datosPerfil" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="">Editar perfil</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Mis disciplinas</p>
                    <a href=""><?php foreach ($alumno as $row) {
                                    $dici = $row["disciplina"];
                                    echo "  " . $dici . "\n";
                                } ?>
                    </a><br />
                    <p>SKILLS</p>
                    <a href="">Sin actividad</a><br />

                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $nombre ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $correo; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $telefono; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Direccion</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $direccion; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Observaciones</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $list['observaciones']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="datos" role="tabpanel" aria-labelledby="datosPerfil">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" value="<?php echo $nombreAlumno; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Ap Paterno:</label>
                                    <input type="text" class="form-control" id="apPaternoALumno" name="apPaternoALumno" value="<?php echo $apPaternoALumno; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Ap Materno:</label>
                                    <input type="text" class="form-control" id="apMaternoALumno" name="apMaternoALumno" value="<?php echo $apMaternoALumno; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">No. de telefono:</label>
                                    <input type="text" class="form-control" id="telefonoAlumno" name="telefonoAlumno" value="<?php echo $telefonoAlumno; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="correoAlumno" name="correoAlumno" value="<?php echo $correoAlumno; ?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                <input type="text" class="form-control" id="direccionAlumno" name="direccionAlumno" value="<?php echo $direccionAlumno; ?>">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Imagen</label>
                                <?php if ($imagenAlumno != "") { ?>
                                    <br />
                                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="img/alumnos/<?php echo $imagenAlumno; ?>">
                                    <br />
                                <?php } ?>
                                <input type="file" class="form-control" accept="image/*" name="imagenAlumno" value="<?php echo $imagenAlumno; ?>"><span><?php echo $imagenAlumno; ?></span>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="actualizarAlumno" class="btn btn-primary">Actualizar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        ?>
    </div>
</section>

<?php require('cabecera/pie.php'); ?>
<?php if ($mostrarModal) { ?>
    <script>
        $('#modalAlumno').modal('show');
    </script>
<?php } ?>