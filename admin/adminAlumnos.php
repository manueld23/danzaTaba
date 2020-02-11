<?php
require('../cabecera/menu.php');
require('../cabecera/barraAdmin.php');
require('../controlador/aAlumno.php');
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
        padding: 3%;
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
        padding-right: 20px;
        padding-left: 20px;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #E4EDF6;
        padding-right: 20px;
        padding-left: 20px;
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
        <h4>Administrar alumnos</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Alumnos con disciplina</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alumnos sin disciplina</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <?php
                        $sentencia = $pdo->prepare("SELECT alumnos.id,alumnos.nombre,alumnos.apPaterno,alumnos.apMaterno, GROUP_CONCAT(bailes.disciplina) 
                                                    FROM alumnos INNER JOIN bailes ON alumnos.id = bailes.id 
                                                    WHERE NOT bailes.idDisciplinas = 0 GROUP by alumnos.id");
                        $sentencia->execute();
                        $conDiscAlumno = $sentencia->fetchAll();

                        ?>
                        <div class="table table-resposive">
                            <table class="rwd-table table table-hover table-bordered" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Alumno</th>
                                        <th scope="col">Disciplina</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;

                                    foreach ($conDiscAlumno as $cDA) { ?>
                                        <tr>
                                            <th scope="row"><?php echo ++$i; ?></th>
                                            <td><?php echo $cDA['nombre'], " ", $cDA['apPaterno'], " ", $cDA['apMaterno']; ?></td>
                                            <td><?php echo $cDA['GROUP_CONCAT(bailes.disciplina)']; ?></td>

                                            <td>

                                                <a href="#editDiscipAlum_<?php echo $cDA['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                                <?php include('../modales/conDiscipAlum.php'); ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?php
                        $sentencia = $pdo->prepare("SELECT alumnos.id,alumnos.nombre,alumnos.apPaterno,alumnos.apMaterno,bailes.id,bailes.disciplina, bailes.idDisciplinas 
                                                FROM `alumnos` INNER JOIN bailes ON alumnos.id = bailes.id 
                                                WHERE bailes.disciplina = 'sin disciplina'");
                        $sentencia->execute();
                        $adminAlumno = $sentencia->fetchAll();

                        $sentencia2 = $pdo->prepare("SELECT disciplina,titulo FROM `disciplinas`");
                        $sentencia2->execute();
                        $discipl = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <div class="table table-resposive">
                            <table class="rwd-table table table-hover table-bordered" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Alumno</th>
                                        <th scope="col">Disciplina</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($adminAlumno as $alum) { ?>
                                        <tr>
                                            <th scope="row"><?php echo ++$i; ?></th>
                                            <td><?php echo $alum['nombre'], " ", $alum['apPaterno'], " ", $alum['apMaterno']; ?></td>
                                            <td><?php echo $alum['disciplina']; ?></td>

                                            <td>

                                                <a href="#delete_<?php echo $alum['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                                                <a href="#edit_<?php echo $alum['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                                <?php include('../modales/adminAlumnoModal.php'); ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php require('../cabecera/pie.php'); ?>