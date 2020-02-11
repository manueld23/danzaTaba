<?php require('conexion/conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="text-center card-title">
                            <h1 class="h4 text-gray-900 mb-4">Ficha de inscripcion!</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="p-5">

                                    <?php
                                    $query = $pdo->prepare("SELECT id,titulo FROM disciplinas");
                                    $query->execute();
                                    $discipl = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>

                                    <form class="user" action="aAlumno.php" method="POST" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="usuarioAlumno" class="form-control form-control-user" id="usuarioAlumno" aria-describedby="emailHelp" placeholder="Usuario">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="contraseniaALumno" class="form-control form-control-user" id="contraseniaALumno" aria-describedby="emailHelp" placeholder="Contraseña">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="nombreAlumno" class="form-control form-control-user" id="nombreAlumno" aria-describedby="emailHelp" placeholder="Nombre del alumno">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="apPaternoALumno" class="form-control form-control-user" id="apPaternoALumno" aria-describedby="emailHelp" placeholder="Apellido paterno del alumno">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="apMaternoALumno" class="form-control form-control-user" id="apMaternoALumno" aria-describedby="emailHelp" placeholder="Apellido materno del alumno">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="direccionAlumno" class="form-control form-control-user" id="direccionAlumno" placeholder="Direccion">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="telefonoAlumno" class="form-control form-control-user" id="telefonoAlumno" placeholder="Numero de telefono">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="correoAlumno" id="correoAlumno" class="form-control form-control-user" placeholder="Correo electronico">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php
                                            $sentencia = $pdo->prepare("SELECT disciplina,titulo FROM disciplinas");
                                            $sentencia->execute();
                                            $discip = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <div class="form-group col-md-6">
                                                <span>Disciplinas</span>
                                                <select id="disciplinaAlumno" name="disciplinaAlumno" class="form-control form-control-user">
                                                    <option value="" disabled>Disciplinas</option>
                                                    <?php foreach ($discip as $di) { ?>
                                                        <option value="<?php echo $di['disciplina'] ?>"><?php echo $di['titulo']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?php
                                                $sentencia = $pdo->prepare("SELECT nombre FROM maestros");
                                                $sentencia->execute();
                                                $maes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                ?>
                                                <span>Maestros</span>
                                                <select name="maestroAlumno" id="maestroAlumno" class="form-control form-control-user">
                                                    <option value="" disabled>Maestros</option>
                                                    <?php foreach ($maes as $ma) { ?>
                                                        <option value="<?php echo $ma['nombre']; ?>"><?php echo $ma['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control form-control-user" name="imagenAlumno"> <br>

                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="accion" value="crearAlumno">
                                            Crear cuenta
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>-->

</body>

</html>