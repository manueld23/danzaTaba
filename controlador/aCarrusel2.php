<?php

$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
$imagen = (isset($_FILES['imagen']["name"])) ? $_FILES['imagen']["name"] : "";

$accion = (isset($_POST['acciones'])) ? $_POST['acciones'] : "";
$mostrarModal = false;

//include('conexion/conexion.php');

switch ($accion) {
    case "agregarCarrusel2":
        $sentencia = $pdo->prepare("INSERT INTO carrusel2(titulo,imagen)
        VALUES (:titulo,:imagen)");

        $sentencia->bindParam(':titulo', $titulo);

        $Fecha = new DateTime();
        $nombreArchivo = ($imagen != "")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"";

        $tmpFoto = $_FILES["imagen"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto,"img/carrusel2/".$nombreArchivo);
        }

        $sentencia->bindParam(':imagen', $nombreArchivo);
        $sentencia->execute();

        break;

    case "actualizarCarrusel2":

        $sentencia = $pdo->prepare("UPDATE carrusel2 SET
        titulo = :titulo WHERE id = :id");

        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        $Fecha = new DateTime();
        $nombreArchivo = ($imagen != "")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"";

        $tmpFoto = $_FILES["imagen"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto,"img/carrusel2/".$nombreArchivo);

            $sentencia = $pdo->prepare("SELECT imagen FROM carrusel2 WHERE id = :id");
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
            print_r($empleado);

            if (isset($empleado["imagen"])) {
                if (file_exists("img/carrusel2/".$empleado["imagen"])) {

                    if ($empleado['imagen']) {
                        unlink("img/carrusel2/".$empleado["imagen"]);
                    }
                }
            }

            $sentencia = $pdo->prepare("UPDATE carrusel2 SET 
            imagen = :imagen WHERE id = :id");
            $sentencia->bindParam(':imagen', $nombreArchivo);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
        }

        break;

    case "btnEliminar":
        $sentencia = $pdo->prepare("SELECT imagen FROM carrusel2 WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
        print_r($empleado);

        if (isset($empleado["imagen"]) && ($empleado['imagen'] != "images.jpeg")) {
            if (file_exists("img/carrusel2/".$empleado["imagen"])) {
                unlink("img/carrusel2/".$empleado["imagen"]);
            }
        }

        $sentencia = $pdo->prepare("DELETE FROM carrusel2 WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();


        break;

    case "mostrar":

        $mostrarModal = true;

        $sentencia = $pdo->prepare("SELECT * FROM carrusel2 WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        $titulo = $empleado['titulo'];
        $imagen = $empleado['imagen'];

        break;
}
