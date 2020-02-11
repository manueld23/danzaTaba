<?php
$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$urlSocial = (isset($_POST['urlSocial'])) ? $_POST['urlSocial'] : "";
$imagenRS = (isset($_FILES['imagenRS']["name"])) ? $_FILES['imagenRS']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$mostrarModal = false;

switch ($accion) {
    case "agregarRed":
        $sentencia = $pdo->prepare("INSERT INTO redesSociales(url,imagenSocial)
        VALUES(:url,:imagenSocial)");

        $sentencia->bindParam(':url', $urlSocial);

        $Fecha = new DateTime();
        $nombreArchivo = ($imagenRS != "") ? $Fecha->getTimestamp() . "_" . $_FILES["imagenRS"]["name"] : "";

        $tmpFoto = $_FILES["imagenRS"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "img/redesSociales/" . $nombreArchivo);
        }

        $sentencia->bindParam(':imagenSocial', $nombreArchivo);
        $sentencia->execute();

        break;

    case "actualizarRedSocial":

        $sentencia = $pdo->prepare("UPDATE redesSociales SET url = :url WHERE id = :id");

        $sentencia->bindParam(':url', $urlSocial);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();


        $Fecha = new DateTime();
        $nombreArchivo = ($imagenRS != "") ? $Fecha->getTimestamp() . "_" . $_FILES["imagenRS"]["name"] : "";

        $tmpFoto = $_FILES["imagenRS"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "img/redesSociales/" . $nombreArchivo);

            $sentencia = $pdo->prepare("SELECT imagenSocial FROM redesSociales WHERE id = :id");
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

            if (isset($empleado["imagenSocial"])) {
                if (file_exists("img/redesSociales/" . $empleado["imagenSocial"])) {

                    if ($empleado['imagenSocial']) {
                        unlink("img/redesSociales/" . $empleado["imagenSocial"]);
                    }
                }
            }

            $sentencia = $pdo->prepare("UPDATE redesSociales SET 
            imagenSocial = :imagenSocial WHERE id = :id");
            $sentencia->bindParam(':imagenSocial', $nombreArchivo);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
        }
        break;

    case "eliminarRedSocial":
    
        $sentencia = $pdo->prepare("SELECT imagenSocial FROM redesSociales WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($empleado["imagenSocial"]) && ($empleado['imagenSocial'] != "images.jpeg")) {
            if (file_exists("img/redesSociales/" . $empleado["imagenSocial"])) {
                unlink("img/redesSociales/" . $empleado["imagenSocial"]);
            }
        }

        $sentencia = $pdo->prepare("DELETE FROM redesSociales WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();


        break;

    case "verRedSocial":

        $mostrarModal = true;

        $sentencia = $pdo->prepare("SELECT id,url,imagenSocial 
                                    FROM redesSociales WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $alumno = $sentencia->fetch(PDO::FETCH_LAZY);

        $urlSocial = $alumno['url'];
        $imagenRS = $alumno['imagenSocial'];

        break;
}
