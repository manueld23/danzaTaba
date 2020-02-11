<?php

$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$disciplina = (isset($_POST['disciplina'])) ? $_POST['disciplina'] : "";
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
$imagen = (isset($_FILES['imagen']["name"])) ? $_FILES['imagen']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$mostrarModal = false;

//include('conexion/conexion.php');

switch ($accion) {
  case "btnAgregar":

    $archivo = "disciplinas/" . $disciplina . '.php';

    if (file_exists($archivo)) {

      echo "<script>alert('Existe el archivo $disciplina.php');</script>";
    } else {

      $sentencia = $pdo->prepare("INSERT INTO disciplinas(disciplina,titulo,descripcion,imagen)
      VALUES (:disciplina,:titulo,:descripcion,:imagen)");

      $sentencia->bindParam(':disciplina', $disciplina);
      $sentencia->bindParam(':titulo', $titulo);
      $sentencia->bindParam(':descripcion', $descripcion);

      $Fecha = new DateTime();
      $nombreArchivo = ($imagen != "") ? $Fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "";

      $tmpFoto = $_FILES["imagen"]["tmp_name"];

      if ($tmpFoto != "") {
        move_uploaded_file($tmpFoto, "img/disciplinas/" . $nombreArchivo);
      }

      $sentencia->bindParam(':imagen', $nombreArchivo);
      /*------------------EN ESTA PARTE SE AGREGAN LAS PAGINAS DINAMICAMENTE-------------*/
      $nuevoarchivo = fopen("disciplinas/$disciplina" . '.php', "w+");
      chmod("./", 0777);
      fwrite($nuevoarchivo, "<?php
        include('../cabecera/menu.php');
        include('../cabecera/tipouser.php');
        include('../aDisciplinas.php');
      ?>
      <section class='section-agents section-t8'>
          <div class='container'>
              <h1 class='text-center'>$titulo</h1>
  
              <div align='center'>
                <img class='img-thumbnail' width='400px' src='../img/disciplinas/$nombreArchivo'/>
              </div>
  
              <br><br>
  
              <div class='col-md-12'>
                  $descripcion
              </div>
          </div>
      </section>
      <?php include('../cabecera/pie.php'); ?>");
      fclose($nuevoarchivo);
      $sentencia->execute();
    }

    //header('Location: disciplinas.php');

    break;

  case "btnActualizar":

    $sentencia = $pdo->prepare("UPDATE disciplinas SET
    disciplina = :disciplina, 
    titulo = :titulo, 
    descripcion = :descripcion WHERE id = :id");

    $sentencia->bindParam(':disciplina', $disciplina);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();

    $Fecha = new DateTime();
    $nombreArchivo = ($imagen != "") ? $Fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "";

    $tmpFoto = $_FILES["imagen"]["tmp_name"];

    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "img/disciplinas/" . $nombreArchivo);

      $sentencia = $pdo->prepare("SELECT imagen FROM disciplinas WHERE id = :id");
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
      $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

      if (isset($empleado["imagen"])) {
        if (file_exists("img/disciplinas/" . $empleado["imagen"])) {

          if ($empleado['imagen']) {
            unlink("img/disciplinas/" . $empleado["imagen"]);
          }

          if ($empleado['disciplina']) {
            unlink("./" . $empleado["disciplina"] . '.php');
          }
        }
      }

      $sentencia = $pdo->prepare("UPDATE disciplinas SET 
        imagen = :imagen WHERE id = :id");
      $sentencia->bindParam(':imagen', $nombreArchivo);
      $sentencia->bindParam(':id', $id);
      $sentencia->execute();
    }

    $sentencia = $pdo->prepare("SELECT titulo,descripcion,imagen FROM disciplinas WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();
    $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

    $titulo = $empleado['titulo'];
    $descripcion = $empleado['descripcion'];
    $imagen = $empleado['imagen'];

    $nuevoarchivo = fopen("disciplinas/$disciplina" . '.php', "w+");
    chmod("./", 0777);
    fwrite($nuevoarchivo, "<?php
      //session_start();
      //include('../cabecera/menu.php');
      include('../cabecera/tipo.php');
      include('../controlador/aDisciplinas.php');
    ?>
    <style>
      .contentdisciplinas{
        background-color: black;
      }
    </style>
    <section class='section-agents section-t8 contentdisciplinas'>
        
        
        <div class='row'>

        <div class='col-md-9 columnas9'>
          <img id='imgFondo' src='../img/disciplinas/$imagen' width='100%' height='100%'>
        </div>
        <div class='col-md-3 colorFondo'>
        <br>        
          <?php 
               if(file_exists('../videos/$disciplina.php')){ ?>
                <a href='../videos/$disciplina.php' class='btn btn-success'>Videos</a>
               <?php }
            ?>
            <button class='btn btn-info'>Informacion</button> <br><br>
          <span>
            $descripcion
          </span>
        </div>
  
      </div>

          <style>
          #imgFondo {
            width: 100%;
            height: 100%;
            position: relative;
          }
         
        .texto-encima{
            position: absolute;
            right: 0;
            display: block;
            opacity: 0.5;
            background-color: blue;
        }
        
        .contentdisciplinas{
          padding-top: 5%;
        }
        
        .colorFondo{
          opacity: 0.7;
          background-color: black;
        }
        
        .columnas9{
          padding: 0;
        }
            .aside{
              background-color: #FF5733;
              width: 30%;
              }
          </style>

    </section>
      <script src='http://localhost/ejercicio4/lib/jquery/jquery.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/jquery/jquery-migrate.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/popper/popper.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/bootstrap/js/bootstrap.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/easing/easing.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/owlcarousel/owl.carousel.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/scrollreveal/scrollreveal.min.js'></script>
      <script src='http://localhost/ejercicio4/contactform/contactform.js'></script>
      <script src='http://localhost/ejercicio4/js/main.js'></script>
      <script src='http://localhost/ejercicio4/vendor/chart.js/Chart.min.js'></script>
      <script src='http://localhost/ejercicio4/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
      <script src='http://localhost/ejercicio4/vendor/jquery-easing/jquery.easing.min.js'></script>
      <script src='http://localhost/ejercicio4/js/sb-admin-2.min.js'></script>
    <?php //include('../cabecera/pie.php'); ?>");
    fclose($nuevoarchivo);

    break;

  case "btnEliminar":

    $sentencia = $pdo->prepare("SELECT imagen,disciplina FROM disciplinas WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();
    $empleado = $sentencia->fetch(PDO::FETCH_LAZY);
    print_r($empleado);

    if (isset($empleado["imagen"]) && ($empleado['imagen'] != "images.jpeg")) {
      if (file_exists("img/disciplinas/" . $empleado["imagen"])) {
        unlink("img/disciplinas/" . $empleado["imagen"]);
      }
      if (file_exists("./" . $empleado["disicplina"])) {
        unlink("disciplinas/" . $empleado["disciplina"] . '.php');
      }
    }

    $sentencia = $pdo->prepare("DELETE FROM disciplinas WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();

    break;

  case "editar":

    $mostrarModal = true;

    $sentencia = $pdo->prepare("SELECT * FROM disciplinas WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();
    $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

    $disciplina = $empleado['disciplina'];
    $titulo = $empleado['titulo'];
    $descripcion = $empleado['descripcion'];
    $imagen = $empleado['imagen'];

    break;
}
