<?php 
include('../conexion/conexion.php');

$txtTituloC = $_POST['txtTituloC'];
$txtDescripcionC = $_POST['txtDescripcionC'];
//$txtImagenC = $_POST['imagen'];
$txtImagenC = (isset($_FILES['imagen']["name"]))?$_FILES['imagen']["name"]:"";

$query = $pdo->prepare("INSERT INTO card(titulo,descripcion,imagen)
                        VALUES(:titulo, :descripcion, :imagen)");

$query->bindParam(':titulo', $txtTituloC);
$query->bindParam(':descripcion', $txtDescripcionC);
$query->bindParam(':imagen', $txtImagenC);

    $Fecha = new DateTime();
    $nombreArchivo = ($txtImagenC!="")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"";

    $tmpFoto = $_FILES["imagen"]["tmp_name"];

    if ($tmpFoto!="") {
    move_uploaded_file($tmpFoto,"../img/logros/".$nombreArchivo);
    }

    $query->bindParam(':imagen', $nombreArchivo);
    $query->execute();

?>