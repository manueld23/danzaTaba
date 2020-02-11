<?php 
//include('conexion/conexion.php');
//$id=$_SESSION['id'];
$id = (isset($_POST['id']))?$_POST['id']:"";
$nombreAlumno = (isset($_POST['nombreAlumno']))?$_POST['nombreAlumno']:"";
$apPaternoALumno = (isset($_POST['apPaternoALumno']))?$_POST['apPaternoALumno']:"";
$apMaternoALumno = (isset($_POST['apMaternoALumno']))?$_POST['apMaternoALumno']:"";

$disciplinaAlumno = (isset($_POST['disciplinaAlumno']))?$_POST['disciplinaAlumno']:"";
$maestroAlumno = (isset($_POST['maestroAlumno']))?$_POST['maestroAlumno']:"";
$telefonoAlumno = (isset($_POST['telefonoAlumno']))?$_POST['telefonoAlumno']:"";
$usuarioAlumno = (isset($_POST['usuarioAlumno']))?$_POST['usuarioAlumno']:"";
$contraseniaALumno = (isset($_POST['contraseniaALumno']))?$_POST['contraseniaALumno']:"";

$imagenAlumno= (isset($_FILES['imagenAlumno']["name"]))?$_FILES['imagenAlumno']["name"]:"";

$correoAlumno = (isset($_POST['correoAlumno']))?$_POST['correoAlumno']:"";
$direccionAlumno = (isset($_POST['direccionAlumno']))?$_POST['direccionAlumno']:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";
$mostrarModal = false;

switch ($accion) {
    case "crearAlumno":
    include('conexion/conexion.php');
        $sentencia = $pdo->prepare("INSERT INTO alumnos(nombre,apPaterno,apMaterno,disciplina,maestro,numero,usuario,contrasenia,imagenUsuario,correo,direccion)
        VALUES (:nombre,:apPaterno,:apMaterno,'sin diciplina','sin maestro',:numero,:usuario,:contrasenia,:imagenUsuario,:correo,:direccion)");

        $sentencia->bindParam(':nombre', $nombreAlumno);
        $sentencia->bindParam(':apPaterno', $apPaternoALumno);
        $sentencia->bindParam(':apMaterno', $apMaternoALumno);
        /*$sentencia->bindParam(':disciplina', $disciplinaAlumno);
        $sentencia->bindParam(':maestro', $maestroAlumno);*/
        $sentencia->bindParam(':numero', $telefonoAlumno);
        $sentencia->bindParam(':usuario', $usuarioAlumno);
        $sentencia->bindParam(':contrasenia', $contraseniaALumno);
        $sentencia->bindParam(':correo', $correoAlumno);
        $sentencia->bindParam(':direccion', $direccionAlumno);

        $Fecha = new DateTime();
        $nombreArchivo = ($imagenAlumno != "")?$Fecha->getTimestamp()."_".$_FILES["imagenAlumno"]["name"]:"avatar.jpeg";

        $tmpFoto = $_FILES["imagenAlumno"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto,"img/alumnos/".$nombreArchivo);
        }

        $sentencia->bindParam(':imagenUsuario', $nombreArchivo);
        $sentencia->execute();
        $idAlumno = $pdo->lastInsertId();

        $sentencia = $pdo->prepare("INSERT INTO bailes(id,disciplina,idDisciplinas)
                                   VALUES($idAlumno,'sin disciplina',0)");
        $sentencia->execute();

        break;

    case "actualizarAlumno":

        $sentencia = $pdo->prepare("UPDATE alumnos SET
        nombre = :nombre,
        apPaterno = :apPaterno,
        apMaterno = :apMaterno,
        numero = :numero,
        correo = :correo,
        direccion = :direccion WHERE id = :id");

        $sentencia->bindParam(':nombre', $nombreAlumno);
        $sentencia->bindParam(':apPaterno', $apPaternoALumno);
        $sentencia->bindParam(':apMaterno', $apMaternoALumno);
        
        $sentencia->bindParam(':numero', $telefonoAlumno);
        
        $sentencia->bindParam(':correo', $correoAlumno);
        $sentencia->bindParam(':direccion', $direccionAlumno);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

          
      $Fecha = new DateTime();
      $nombreArchivo = ($imagenAlumno!="")?$Fecha->getTimestamp()."_".$_FILES["imagenAlumno"]["name"]:"";
  
      $tmpFoto = $_FILES["imagenAlumno"]["tmp_name"];
  
      if ($tmpFoto!="") {
        move_uploaded_file($tmpFoto,"img/alumnos/".$nombreArchivo);
  
          $sentencia = $pdo->prepare("SELECT imagenUsuario FROM alumnos WHERE id = :id");
          $sentencia->bindParam(':id', $id);
          $sentencia->execute();
          $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
          print_r($empleado);
  
          if (isset($empleado["imagenUsuario"])) {
            if (file_exists("img/alumnos/".$empleado["imagenUsuario"])) {
  
              if ($empleado['imagenUsuario']) {
                unlink("img/alumnos/".$empleado["imagenUsuario"]);
              }
            }
          }
  
          $sentencia = $pdo->prepare("UPDATE alumnos SET 
          imagenUsuario = :imagenUsuario WHERE id = :id");
          $sentencia->bindParam(':imagenUsuario', $nombreArchivo);
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

    case "mostrarAlumno":

        $mostrarModal = true;

        $sentencia = $pdo->prepare("SELECT id,nombre,apPaterno,apMaterno,disciplina,maestro,numero,imagenUsuario,correo,direccion 
                                    FROM alumnos WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $alumno = $sentencia->fetch(PDO::FETCH_LAZY);

        $nombreAlumno = $alumno['nombre'];
        $apPaternoALumno = $alumno['apPaterno'];
        $apMaternoALumno = $alumno['apMaterno'];
        $telefonoAlumno = $alumno['numero'];
        $correoAlumno = $alumno['correo'];
        $direccionAlumno = $alumno['direccion'];
        $imagenAlumno = $alumno['imagenUsuario'];

        break;
}


?>