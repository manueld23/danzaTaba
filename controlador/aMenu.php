<?php
//include('conexion/conexion.php');
$id = (isset($_POST['id']))?$_POST['id']:"";
$nombreM = (isset($_POST['nombreM']))?$_POST['nombreM']:"";
$iconoM = (isset($_FILES['iconoM']["name"]))?$_FILES['iconoM']["name"]:"";
$seleccionadoM = (isset($_FILES['seleccionadoM']["name"]))?$_FILES['seleccionadoM']["name"]:"";
$menuColor = (isset($_POST['menuColor']))?$_POST['menuColor']:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";
$mostrarModal = false;

switch ($accion) {
    case "agregarIcono":
          
      $sentencia = $pdo->prepare("INSERT INTO menu(nombre,icono,seleccionado)
                  VALUES(:nombre,:icono,:seleccionado)");

      $sentencia->bindParam(':nombre', $nombreM);
        
      $Fecha = new DateTime();
      $nombreArchivo = ($iconoM!="")?$Fecha->getTimestamp()."_".$_FILES["iconoM"]["name"]:"";
    
      $tmpFoto = $_FILES["iconoM"]["tmp_name"];

      if ($tmpFoto!="") {
        move_uploaded_file($tmpFoto,"iconos/iconosMenu/".$nombreArchivo);
      }

      $Fecha2 = new DateTime();
      $nombreArchivo2 = ($seleccionadoM!="")?$Fecha2->getTimestamp()."_".$_FILES["seleccionadoM"]["name"]:"";
    
      $tmpFoto2 = $_FILES["seleccionadoM"]["tmp_name"];

      if ($tmpFoto2!="") {
        move_uploaded_file($tmpFoto2,"iconos/iconosMenu/".$nombreArchivo2);
      }

      $sentencia->bindParam(':icono',$nombreArchivo);
      $sentencia->bindParam(':seleccionado', $nombreArchivo2);
      $sentencia->execute();
      //header('Location: index.php');
            
    break;
      
    case "actualizarI":
      $sentencia = $pdo->prepare("UPDATE menu SET nombre = :nombre WHERE id = :id");
    
      $sentencia->bindParam(':nombre', $nombreM);
      $sentencia->bindParam(':id', $id);
      $sentencia->execute(); 

      $Fecha = new DateTime();
      $nombreArchivo = ($iconoM!="")?$Fecha->getTimestamp()."_".$_FILES["iconoM"]["name"]:"";
  
      $tmpFoto = $_FILES["iconoM"]["tmp_name"];

      $Fecha2 = new DateTime();
      $nombreArchivo2 = ($seleccionadoM!="")?$Fecha2->getTimestamp()."_".$_FILES["seleccionadoM"]["name"]:"";
  
      $tmpFoto2 = $_FILES["seleccionadoM"]["tmp_name"];
  
        if ($tmpFoto!="") {
        move_uploaded_file($tmpFoto,"iconos/iconosMenu/".$nombreArchivo);
  
          $sentencia = $pdo->prepare("SELECT icono FROM menu WHERE id = :id");
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
          $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
          
  
          if (isset($empleado["icono"])) {
            if (file_exists("iconos/iconosMenu/".$empleado["icono"])) {
  
              if ($empleado['icono']) {
                unlink("iconos/iconosMenu/".$empleado["icono"]);
              }
            }
          }
  
          $sentencia = $pdo->prepare("UPDATE menu SET 
          icono = :icono WHERE id = :id");
          $sentencia->bindParam(':icono', $nombreArchivo);
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
      }

      if ($tmpFoto2!="") {
        move_uploaded_file($tmpFoto2,"iconos/iconosMenu/".$nombreArchivo2);
  
          $sentencia = $pdo->prepare("SELECT seleccionado FROM menu WHERE id = :id");
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
          $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
          
  
          if (isset($empleado["seleccionado"])) {
            if (file_exists("iconos/iconosMenu/".$empleado["seleccionado"])) {
  
              if ($empleado['seleccionado']) {
                unlink("iconos/iconosMenu/".$empleado["seleccionado"]);
              }
            }
          }
  
          $sentencia = $pdo->prepare("UPDATE menu SET 
          seleccionado = :seleccionado WHERE id = :id");
          $sentencia->bindParam(':seleccionado', $nombreArchivo2);
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
      }
  
    break;
    
    case "btnEliminar":
  
      $sentencia = $pdo->prepare("SELECT icono,seleccionado FROM menu WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
      $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
  
      if (isset($empleado["icono"])&&($empleado['icono']!="images.jpeg")) {
        if (file_exists("iconos/iconosMenu/".$empleado["icono"])) {
          unlink("iconos/iconosMenu/".$empleado["icono"]);
        }
      }

      if (isset($empleado["seleccionado"])&&($empleado['seleccionado']!="images.jpeg")) {
        if (file_exists("iconos/iconosMenu/".$empleado["seleccionado"])) {
          unlink("iconos/iconosMenu/".$empleado["seleccionado"]);
        }
      }
      
      $sentencia = $pdo->prepare("DELETE FROM menu WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
  
    break;
  
    case "editar":
  
      $mostrarModal = true;
      
      $sentencia = $pdo->prepare("SELECT * FROM menu WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
      $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
  
      $nombreM = $empleado['nombre'];
      $iconoM = $empleado['icono'];
      $seleccionadoM = $empleado['seleccionado'];
    break;

    case "cambioMenu":

      $sentencia = $pdo->prepare("UPDATE colores SET menuColor = :menuColor WHERE id = 1");
      $sentencia->bindParam(':menuColor', $menuColor);
      $sentencia->execute();

    break;
  }
?>