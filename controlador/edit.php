<?php
require_once __DIR__ . "/../conexion/conexion.php";

$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
$imagen = (isset($_FILES['imagen']["name"])) ? $_FILES['imagen']["name"] : "";
$medalla = (isset($_FILES['medalla']["name"])) ? $_FILES['medalla']["name"] : "";
$tituloColor = (isset($_POST['tituloColor']))?$_POST['tituloColor']:"";
$descripColor = (isset($_POST['descripColor']))?$_POST['descripColor']:"";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {

    case 'agregar':

        $query = $pdo->prepare("INSERT INTO card(titulo,descripcion,imagen,medalla,tituloColor,descripColor)
        VALUES(:titulo, :descripcion, :imagen,:medalla,:tituloColor,:descripColor)");

        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':tituloColor',$tituloColor);
        $query->bindParam(':descripColor',$descripColor);

        $Fecha = new DateTime();
        $nombreArchivo = ($imagen != "") ? $Fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "";

        $tmpFoto = $_FILES["imagen"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "../img/logros/" . $nombreArchivo);
        }

        $Fecha2 = new DateTime();
        $nombreArchivo2 = ($medalla != "") ? $Fecha2->getTimestamp() . "_" . $_FILES["medalla"]["name"] : "";

        $tmpFoto2 = $_FILES["medalla"]["tmp_name"];

        if ($tmpFoto2 != "") {
            move_uploaded_file($tmpFoto2, "../img/logros/" . $nombreArchivo2);
        }

        $query->bindParam(':imagen', $nombreArchivo);
        $query->bindParam(':medalla', $nombreArchivo2);
        $query->execute();

        header('Location: ../logros.php');

        break;

    case 'editar':

        $sentencia = $pdo->prepare("UPDATE `card` SET 
        titulo = :titulo,
        descripcion = :descripcion,
        tituloColor = :tituloColor,
        descripColor = :descripColor 
        WHERE id = :id");

        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':tituloColor',$tituloColor);
        $sentencia->bindParam(':descripColor',$descripColor);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        $Fecha = new DateTime();
        $nombreArchivo = ($imagen != "") ? $Fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "";

        $tmpFoto = $_FILES["imagen"]["tmp_name"];

        $Fecha2 = new DateTime();
        $nombreArchivo2 = ($medalla != "") ? $Fecha2->getTimestamp() . "_" . $_FILES["medalla"]["name"] : "";

        $tmpFoto2 = $_FILES["medalla"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "../img/logros/" . $nombreArchivo);

            $sentencia = $pdo->prepare("SELECT imagen FROM `card` WHERE id = :id");
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);


            if (isset($empleado["imagen"])) {
                if (file_exists("../img/logros/" . $empleado["imagen"])) {

                    if ($empleado['imagen']) {
                        unlink("../img/logros/" . $empleado["imagen"]);
                    }
                }
            }

            $sentencia = $pdo->prepare("UPDATE `card` SET 
            imagen = :imagen
            WHERE id = :id");
            $sentencia->bindParam(':imagen', $nombreArchivo);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
        }

        if ($tmpFoto2 != "") {
            move_uploaded_file($tmpFoto2, "../img/logros/" . $nombreArchivo2);

            $sentencia = $pdo->prepare("SELECT medalla FROM `card` WHERE id = :id");
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);


            if (isset($empleado["medalla"])) {
                if (file_exists("../img/logros/" . $empleado["medalla"])) {

                    if ($empleado['medalla']) {
                        unlink("../img/logros/" . $empleado["medalla"]);
                    }
                }
            }

            $sentencia = $pdo->prepare("UPDATE `card` SET 
                medalla = :medalla
                WHERE id = :id");
            $sentencia->bindParam(':medalla', $nombreArchivo2);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
        }

        header('Location: ../logros.php');
        break;

    case 'eliminar':

        $sentencia = $pdo->prepare("SELECT imagen,medalla FROM `card` WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($empleado["imagen"]) && ($empleado['imagen'] != "images.jpeg")) {
            if (file_exists("../img/logros/".$empleado["imagen"])) {
                unlink("../img/logros/".$empleado["imagen"]);
            }
        }

        if (isset($empleado["medalla"]) && ($empleado['medalla'] != "images.jpeg")) {
            if (file_exists("../img/logros/".$empleado["medalla"])) {
                unlink("../img/logros/".$empleado["medalla"]);
            }
        }

        $sql = $pdo->prepare("DELETE FROM `card` WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        header('Location: ../logros.php');

        break;

    case 'quitarMedalla':

        $sql = $pdo->prepare("SELECT id,medalla FROM `card` WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        $quitar = $sql->fetch(PDO::FETCH_LAZY);
        $medalla = $quitar['medalla'];

        if (isset($medalla)) {
            if (file_exists("../img/logros/" . $medalla)) {

                if ($medalla) {
                    unlink("../img/logros/" . $medalla);
                }
            }
        }
        $sql = $pdo->prepare("UPDATE `card` SET medalla = '' WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        header('Location: ../logros.php');
        break;
}
