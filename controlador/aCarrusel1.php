<?php
$id = (isset($_POST['id']))?$_POST['id']:"";

$tituloCC = (isset($_POST['tituloCC']))?$_POST['tituloCC']:"";
$tituloC = (isset($_POST['tituloC']))?$_POST['tituloC']:"";

$numeroCC = (isset($_POST['numeroCC']))?$_POST['numeroCC']:"";
$numeroC = (isset($_POST['numeroC']))?$_POST['numeroC']:"";

$numerodosCC = (isset($_POST['numeroDCC']))?$_POST['numeroDCC']:"";
$numerodosC = (isset($_POST['numerodosC']))?$_POST['numerodosC']:"";

$subtituloCC = (isset($_POST['subtituloCC']))?$_POST['subtituloCC']:"";
$subtituloC = (isset($_POST['subtituloC']))?$_POST['subtituloC']:"";

$subtitulodosCC = (isset($_POST['subtituloDCC']))?$_POST['subtituloDCC']:"";
$subtitulodosC = (isset($_POST['subtitulodosC']))?$_POST['subtitulodosC']:"";

$imagenC = (isset($_FILES['imagenC']["name"]))?$_FILES['imagenC']["name"]:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";
$mostrarModal = false;

//include('conexion/conexion.php');

switch ($accion) {
    case "agregarCarruel":
    echo "agregando";
          
      $sentencia = $pdo->prepare("INSERT INTO carrusel1(titulo,numero,numerodos,subtitulo,subdos,imagen,tituloC,numeroC,numeroDC,subtituloC,subdosC)
      VALUES(:titulo,:numero,:numerodos,:subtitulo,:subdos,:imagen,:tituloC,:numeroC,:numeroDC,:subtituloC,:subdosC)");

      $sentencia->bindParam(':titulo', $tituloC);
      $sentencia->bindParam(':numero', $numeroC);
      $sentencia->bindParam(':numerodos', $numerodosC);
      $sentencia->bindParam(':subtitulo', $subtituloC);
      $sentencia->bindParam(':subdos', $subtitulodosC);

      $sentencia->bindParam(':tituloC', $tituloCC);
      $sentencia->bindParam(':numeroC', $numeroCC);
      $sentencia->bindParam(':numeroDC', $numerodosCC);
      $sentencia->bindParam(':subtituloC', $subtituloCC);
      $sentencia->bindParam(':subdosC', $subtitulodosCC); 

      $Fecha = new DateTime();
      $nombreArchivo = ($imagenC!="")?$Fecha->getTimestamp()."_".$_FILES["imagenC"]["name"]:"";
    
      $tmpFoto = $_FILES["imagenC"]["tmp_name"];

      if ($tmpFoto!="") {
        move_uploaded_file($tmpFoto,"img/carrusel/".$nombreArchivo);
      }

      $sentencia->bindParam(':imagen', $nombreArchivo);
      $sentencia->execute();
      //header('Location: index.php');
            
    break;
      
    case "actualizarC":

      $sentencia = $pdo->prepare("UPDATE carrusel1 SET 
      titulo = :titulo,
      numero = :numero,
      numerodos = :numerodos,
      subtitulo = :subtitulo,
      subdos = :subdos,
      tituloC = :tituloC,
      numeroC = :numeroC,
      numeroDC = :numeroDC,
      subtituloC = :subtituloC,
      subdosC = :subdosC WHERE id = :id");
  
      /*$sentencia = $pdo->prepare("UPDATE carrusel1 SET 
      titulo = :titulo, 
      numero = :numero,
      numerodos = :numerodos,
      subtitulo = :subtitulo,
      subdos = :subdos
      tituloC = :tituloC,
      numeroC = :numeroC,
      numeroDC = :numeroDC,
      subtituloC = :subtituloC,
      subdosC = :subdosC WHERE id = :id");*/
    
      $sentencia->bindParam(':titulo', $tituloC);
      $sentencia->bindParam(':numero', $numeroC);
      $sentencia->bindParam(':numerodos', $numerodosC);
      $sentencia->bindParam(':subtitulo', $subtituloC);
      $sentencia->bindParam(':subdos', $subtitulodosC);

      $sentencia->bindParam(':tituloC', $tituloCC);
      $sentencia->bindParam(':numeroC', $numeroCC);
      $sentencia->bindParam(':numeroDC', $numerodosCC);
      $sentencia->bindParam(':subtituloC', $subtituloCC);
      $sentencia->bindParam(':subdosC', $subtitulodosCC); 
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
  
      $Fecha = new DateTime();
      $nombreArchivo = ($imagenC!="")?$Fecha->getTimestamp()."_".$_FILES["imagenC"]["name"]:"";
  
      $tmpFoto = $_FILES["imagenC"]["tmp_name"];
  
      if ($tmpFoto!="") {
        move_uploaded_file($tmpFoto,"img/carrusel/".$nombreArchivo);
  
          $sentencia = $pdo->prepare("SELECT imagen FROM carrusel1 WHERE id = :id");
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
          $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
          print_r($empleado);
  
          if (isset($empleado["imagen"])) {
            if (file_exists("img/carrusel/".$empleado["imagen"])) {
  
              if ($empleado['imagen']) {
                unlink("img/carrusel/".$empleado["imagen"]);
              }
            }
          }
  
          $sentencia = $pdo->prepare("UPDATE carrusel1 SET 
          imagen = :imagen WHERE id = :id");
          $sentencia->bindParam(':imagen', $nombreArchivo);
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
      }
  
    break;
    
    case "btnEliminar":
  
      $sentencia = $pdo->prepare("SELECT imagen FROM carrusel1 WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
      $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
      print_r($empleado);
  
      if (isset($empleado["imagen"])&&($empleado['imagen']!="images.jpeg")) {
        if (file_exists("img/carrusel/".$empleado["imagen"])) {
          unlink("img/carrusel/".$empleado["imagen"]);
        }
      }
      
      $sentencia = $pdo->prepare("DELETE FROM carrusel1 WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
  
    break;
  
    case "editar":
  
      $mostrarModal = true;
      
      $sentencia = $pdo->prepare("SELECT * FROM carrusel1 WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
      $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
  
      $tituloC = $empleado['titulo'];
      $numeroC = $empleado['numero'];
      $numerodosC = $empleado['numerodos'];
      $subtituloC = $empleado['subtitulo'];
      $subtitulodosC = $empleado['subdos'];
      $imagenC = $empleado['imagen'];

      $tituloCC = $empleado['tituloC'];
      $numeroCC = $empleado['numeroC'];
      $numerodosCC = $empleado['numeroDC'];
      $subtituloCC = $empleado['subtituloC'];
      $subtitulodosCC = $empleado['subdosC'];

    break;
  }
?>