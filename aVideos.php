<?php
//include('conexion/conexion.php');
require_once __DIR__ . "/conexion/conexion.php";

$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
$video = (isset($_POST['video'])) ? $_POST['video'] : "";
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$video2 = (isset($_POST['video2'])) ? $_POST['video2'] : "";
$video3 = (isset($_POST['video3'])) ? $_POST['video3'] : "";
$video4 = (isset($_POST['video4'])) ? $_POST['video4'] : "";
$video5 = (isset($_POST['video5'])) ? $_POST['video5'] : "";
$video6 = (isset($_POST['video6'])) ? $_POST['video6'] : "";

$mostrarModal = false;
$modalUnicoVideo = false;
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {
    case "agregarVideo":

        $sentencia = $pdo->prepare("INSERT INTO videos(titulo,descripcion,video,nombre,video2,video3,video4,video5,video6) 
                                VALUES (:titulo,:descripcion,:video,:nombre,:video2,:video3,:video4,:video5,:video6)");

        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':video', $video);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':video2', $video2);
        $sentencia->bindParam(':video3', $video3);
        $sentencia->bindParam(':video4', $video4);
        $sentencia->bindParam(':video5', $video5);
        $sentencia->bindParam(':video6', $video6);

        $nuevoarchivo = fopen("videos/$nombre" . '.php', "w+");
        //chmod("./", 0777);
        fwrite($nuevoarchivo, "<?php
        //session_start();
        //include('../cabecera/menu.php');
        include('../cabecera/tipo.php');
        include('../aVideos.php');
        ?>
        <section class='section-agents section-t8'>
            <div class='container'>
                <h1 class='text-center'>$titulo</h1>

                <style>
                    #video {
                        width: 98%;
                        height: 98%;
                    }
                </style>

                <div class='row'>
                    
                        <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                            <iframe id='video' class='embed-responsive-item' src='$video' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                        </div>
                    
                </div>

                <div class='col-md-12'>
                    $descripcion
                </div>
            </div>
        </section>
        <?php include('../cabecera/pie.php'); ?>");
        fclose($nuevoarchivo);
        $sentencia->execute();

        header('Location: listaVideos.php');

        break;

    case "actualizarVideo":

        $sentencia = $pdo->prepare("UPDATE videos SET 
                                   titulo =:titulo,
                                   descripcion = :descripcion,
                                   video = :video,
                                   nombre = :nombre,
                                   video2 = :video2,
                                   video3 = :video3,
                                   video4 = :video4,
                                   video5 = :video5,
                                   video6 = :video6 WHERE id = :id");

        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':video', $video);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':video2', $video2);
        $sentencia->bindParam(':video3', $video3);
        $sentencia->bindParam(':video4', $video4);
        $sentencia->bindParam(':video5', $video5);
        $sentencia->bindParam(':video6', $video6);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        $nuevoarchivo = fopen("videos/$nombre" . '.php', "w+");
        //chmod("./", 0777);
        fwrite($nuevoarchivo, "<?php
        //session_start();
        //include('../cabecera/menu.php');
        include('../cabecera/tipo.php');
        include('../aVideos.php');
        ?>
        <section class='section-agents section-t8'>
            <div class='container'>
                <h1 class='text-center'>Videos de $titulo</h1>

                <style>
                    #video {
                        width: 98%;
                        height: 98%;
                    }
                </style>

                <div class='row'>
                
                    <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                       <iframe id='video' class='embed-responsive-item' src='$video' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>

                    <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                       <iframe id='video' class='embed-responsive-item' src='$video2' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>

                    <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                       <iframe id='video' class='embed-responsive-item' src='$video3' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>

                    <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                       <iframe id='video' class='embed-responsive-item' src='$video4' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>

                    <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                       <iframe id='video' class='embed-responsive-item' src='$video5' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>

                    <div class='col-md-6 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9'>
                       <iframe id='video' class='embed-responsive-item' src='$video6' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>
                
                </div>

                <br><br>

                <div class='col-md-12'>
                    $descripcion
                </div>

            </div>
        </section>
        <?php include('../cabecera/pie.php'); ?>");
        fclose($nuevoarchivo);

        //header('Location:listaVideos.php');
        break;

    case 'verVideo':
        $mostrarModal = true;

        $sentencia = $pdo->prepare("SELECT * FROM videos WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $listaVid = $sentencia->fetch(PDO::FETCH_LAZY);

        $titulo = $listaVid['titulo'];
        $descripcion = $listaVid['descripcion'];
        $video = $listaVid['video'];
        $nombre = $listaVid['nombre'];
        $video2 = $listaVid['video2'];
        $video3 = $listaVid['video3'];
        $video4 = $listaVid['video4'];
        $video5 = $listaVid['video5'];
        $video6 = $listaVid['video6'];
        break;

    case 'eliminarVideo':

        $sentencia = $pdo->prepare("SELECT nombre FROM videos WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
        print_r($empleado);

        if (isset($empleado["nombre"])) {
            unlink("videos/" . $empleado["nombre"] . '.php');
        }

        $sentencia = $pdo->prepare("DELETE FROM videos WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        //header('Location: listaVideos.php');

        break;

    case 'agregarUnico':
        $sentencia = $pdo->prepare("UPDATE `videos` SET `video` = :video WHERE `videos`.`id` = 2");

        $sentencia->bindParam(':video', $video);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        break;

    case 'video':
        $modalUnicoVideo = true;
        break;

    case "videosDisciplinas":
        $sentencia = $pdo->prepare("SELECT id FROM videos WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $listaVid = $sentencia->fetch(PDO::FETCH_LAZY);

        $idVideos = $listaVid['id'];

        $sentencia = $pdo->prepare("INSERT INTO videosDisciplinas(videosV,videoUrl)
                                    VALUES(:videosV, :videoUrl)");

        $sentencia->bindParam(':videosV', $idVideos);
        $sentencia->bindParam(':videoUrl', $video);
        $sentencia->execute();
        break;
}

/*if (isset($_POST['videoDiscip']) && $_POST['videoDiscip'] == 'videosDisciplinas') {
    //echo "<script>alert('ingresando video');</script>";
    $sentencia = $pdo->prepare("SELECT id FROM videos WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();
    $listaVid = $sentencia->fetch(PDO::FETCH_LAZY);

    $idVideos = $listaVid['id'];

    $sentencia = $pdo->prepare("INSERT INTO videosDisciplinas(videosV,videoUrl)
                                    VALUES(:videosV, :videoUrl)");

    $sentencia->bindParam(':videosV', $idVideos);
    $sentencia->bindParam(':videoUrl', $video);
    $sentencia->execute();
    
}*/
