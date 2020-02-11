<?php
//include('conexion/conexion.php');
$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$nombreB = (isset($_POST['nombreB'])) ? $_POST['nombreB'] : "";
$iconoB = (isset($_FILES['iconoB']["name"])) ? $_FILES['iconoB']["name"] : "";
$seleccionadoB = (isset($_FILES['selecionadoB']["name"])) ? $_FILES['selecionadoB']["name"] : "";
$barraColor = (isset($_POST['colorBarra'])) ? $_POST['colorBarra'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$mostrarModal = false;

switch ($accion) {
    case "agregarIcono":

        $sentencia = $pdo->prepare("INSERT INTO barra(nombre,icono,seleccionado)
                  VALUES(:nombre,:icono,:seleccionado)");

        $sentencia->bindParam(':nombre', $nombreB);

        $Fecha = new DateTime();
        $nombreArchivo = ($iconoB != "") ? $Fecha->getTimestamp() . "_" . $_FILES["iconoB"]["name"] : "";

        $tmpFoto = $_FILES["iconoB"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "iconos/iconosBarra/" . $nombreArchivo);
        }

        $Fecha2 = new DateTime();
        $nombreArchivo2 = ($seleccionadoB != "") ? $Fecha2->getTimestamp() . "_" . $_FILES["selecionadoB"]["name"] : "";

        $tmpFoto2 = $_FILES["selecionadoB"]["tmp_name"];

        if ($tmpFoto2 != "") {
            move_uploaded_file($tmpFoto2, "iconos/iconosBarra/" . $nombreArchivo2);
        }

        $sentencia->bindParam(':icono', $nombreArchivo);
        $sentencia->bindParam(':seleccionado', $nombreArchivo2);
        $sentencia->execute();
        //header('Location: index.php');

        break;

    case "actualizarB":
    $sentencia = $pdo->prepare("UPDATE barra SET nombre = :nombre WHERE id = :id");

    $sentencia->bindParam(':nombre', $nombreB);
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();

    $Fecha = new DateTime();
    $nombreArchivo = ($iconoB != "")?$Fecha->getTimestamp()."_".$_FILES["iconoB"]["name"]:"";

    $tmpFoto = $_FILES["iconoB"]["tmp_name"];

    $Fecha2 = new DateTime();
    $nombreArchivo2 = ($seleccionadoB != "") ? $Fecha2->getTimestamp()."_".$_FILES["selecionadoB"]["name"]:"";

    $tmpFoto2 = $_FILES["selecionadoB"]["tmp_name"];

    if ($tmpFoto != "") {
        move_uploaded_file($tmpFoto, "iconos/iconosBarra/" . $nombreArchivo);

        $sentencia = $pdo->prepare("SELECT icono FROM barra WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($empleado["icono"])) {
            if (file_exists("iconos/iconosBarra/".$empleado["icono"])) {

                if ($empleado['icono']) {
                    unlink("iconos/iconosBarra/".$empleado["icono"]);
                }
            }
        }

        $sentencia = $pdo->prepare("UPDATE barra SET icono = :icono WHERE id = :id");
        $sentencia->bindParam(':icono', $nombreArchivo);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
    }

    if ($tmpFoto2 != "") {
        move_uploaded_file($tmpFoto2, "iconos/iconosBarra/" . $nombreArchivo2);

        $sentencia2 = $pdo->prepare("SELECT seleccionado FROM barra WHERE id = :id");
        $sentencia2->bindParam(':id', $id);
        $sentencia2->execute();
        $selecionado = $sentencia2->fetch(PDO::FETCH_LAZY);

        if (isset($selecionado["seleccionado"])) {
            if (file_exists("iconos/iconosBarra/".$selecionado["seleccionado"])) {

                if ($selecionado['seleccionado']) {
                    unlink("iconos/iconosBarra/".$selecionado["seleccionado"]);
                }
            }
        }

        $sentencia2 = $pdo->prepare("UPDATE barra SET seleccionado = :seleccionado WHERE id = :id");
        $sentencia2->bindParam(':seleccionado', $nombreArchivo2);
        $sentencia2->bindParam(':id', $id);
        $sentencia2->execute();
    }

        break;

    case "btnEliminar":

        $sentencia = $pdo->prepare("SELECT icono,seleccionado FROM barra WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
        //print_r($empleado);

        if (isset($empleado["icono"]) && ($empleado['icono'] != "images.jpeg")) {
            if (file_exists("iconos/iconosBarra/" . $empleado["icono"])) {
                unlink("iconos/iconosBarra/" . $empleado["icono"]);
            }
        }

        if (isset($empleado["seleccionado"]) && ($empleado['seleccionado'] != "images.jpeg")) {
            if (file_exists("iconos/iconosBarra/" . $empleado["seleccionado"])) {
                unlink("iconos/iconosBarra/" . $empleado["seleccionado"]);
            }
        }

        $sentencia = $pdo->prepare("DELETE FROM barra WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        break;

    case "editar":

        $mostrarModal = true;

        $sentencia = $pdo->prepare("SELECT * FROM barra WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        $nombreB = $empleado['nombre'];
        $iconoB = $empleado['icono'];
        $seleccionadoB = $empleado['selecionado'];
        break;

    case "cambioColor":
        $sentencia = $pdo->prepare("UPDATE colores SET barraColor = :barraColor WHERE id = 1");
        $sentencia->bindParam(':barraColor', $barraColor);
        $sentencia->execute();

        //header('Location: barra.php');
        //header('Location: cabecera/barraAdmin.php');

        break;
}
