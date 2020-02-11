<?php //include('conexion/conexion.php');
session_start();
require_once __DIR__ . "/../conexion/conexion.php";
//$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tara Escuela de danza</title>

  <!-- Custom fonts for this template-->
  <link href="http://localhost/ejercicio4/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/ejercicio4/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- ---------- Librerias de la plantilla EstateAgency2 -------- -->

  <!-- Main Stylesheet File -->
  <link href="http://localhost/ejercicio4/css/style.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="http://localhost/ejercicio4/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="http://localhost/ejercicio4/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://localhost/ejercicio4/lib/animate/animate.min.css" rel="stylesheet">
  <link href="http://localhost/ejercicio4/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="http://localhost/ejercicio4/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link href="http://localhost/ejercicio4/css/main.css" rel="stylesheet">

  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="http://localhost/ejercicio4/engine1/style.css" />
  <script type="text/javascript" src="http://localhost/ejercicio4/engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

  <link rel="icon" type="image/ico" href="http://localhost/ejercicio4/iconos/danza2.ico">
  <link href="http://localhost/ejercicio4/css/cabecera/barra.css" rel="stylesheet">
  <link href="http://localhost/ejercicio4/css/cabecera/menu.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
<!--
<div id="contenedor_carga">
  <div id="carga">

  </div>
</div>-->

    <?php
    $sentencia = $pdo->prepare("SELECT nombre,icono,seleccionado FROM barra WHERE id = 1");
    $sentencia->execute();
    $menu = $sentencia->fetch(PDO::FETCH_LAZY);
    $me = $menu['icono'];
    
    $sentencia2 = $pdo->prepare("SELECT icono FROM barra WHERE id = 2");
    $sentencia2->execute();
    $buscador = $sentencia2->fetch(PDO::FETCH_LAZY);
    $buscar = $buscador['icono'];
    
    $sentencia3 = $pdo->prepare("SELECT nombre,icono,seleccionado FROM barra WHERE id = 3");
    $sentencia3->execute();
    $herramientas = $sentencia3->fetch(PDO::FETCH_LAZY);
    $herra = $herramientas['icono'];
    
    $sentencia4 = $pdo->prepare("SELECT nombre,icono,seleccionado FROM barra WHERE id = 4");
    $sentencia4->execute();
    $notificacion = $sentencia4->fetch(PDO::FETCH_LAZY);
    $noti = $notificacion['icono'];
    
    $sentencia5 = $pdo->prepare("SELECT nombre,icono,seleccionado FROM barra WHERE id = 5");
    $sentencia5->execute();
    $mensajes = $sentencia5->fetch(PDO::FETCH_LAZY);
    $men = $mensajes['icono'];

    /*$id = $_SESSION['id'];
    $sentencia6 = $pdo->prepare("SELECT imagenUsuario FROM alumnos WHERE id =".$id."");
    $sentencia6->execute();
    $perfil = $sentencia6->fetch(PDO::FETCH_LAZY);
    $per = $perfil['imagenUsuario'];*/

    $sentencia6 = $pdo->prepare("SELECT nombre,icono,seleccionado FROM barra WHERE id = 6");
    $sentencia6->execute();
    $perfil = $sentencia6->fetch(PDO::FETCH_LAZY);
    $per = $perfil['icono'];
    /**-------------------------------------------------------------- */
    $sentencia = $pdo->prepare("SELECT barraColor FROM colores WHERE id = 1");
    $sentencia->execute();
    $barra = $sentencia->fetch(PDO::FETCH_LAZY);
    $color = $barra['barraColor'];

    $sentencia = $pdo->prepare("SELECT menuColor FROM colores WHERE id = 1");
    $sentencia->execute();
    $menuColor = $sentencia->fetch(PDO::FETCH_LAZY);
    $colorMenu = $menuColor['menuColor'];

    $sentencia3 = $pdo->prepare("SELECT icono FROM menu WHERE id = 4");
    $sentencia3->execute();
    $icon = $sentencia3->fetch(PDO::FETCH_LAZY);
    $ico = $icon['icono'];

    $sentencia4 = $pdo->prepare("SELECT icono FROM menu WHERE id = 5");
    $sentencia4->execute();
    $discipli = $sentencia4->fetch(PDO::FETCH_LAZY);
    $disc = $discipli['icono'];

    $sentencia5 = $pdo->prepare("SELECT icono FROM menu WHERE id = 6");
    $sentencia5->execute();
    $compartenos = $sentencia5->fetch(PDO::FETCH_LAZY);
    $compar = $compartenos['icono'];

    $sentencia6 = $pdo->prepare("SELECT icono FROM menu WHERE id = 7");
    $sentencia6->execute();
    $contacto = $sentencia6->fetch(PDO::FETCH_LAZY);
    $contac = $contacto['icono'];

    $sentencia7 = $pdo->prepare("SELECT icono FROM menu WHERE id = 8");
    $sentencia7->execute();
    $maestro = $sentencia7->fetch(PDO::FETCH_LAZY);
    $maes = $maestro['icono'];
    ?>

    <style>
      .navbar {
        background-color: <?php echo $color;
                          ?>;
        position: fixed;
        z-index: 1000;
        top: 0;
        width: 100%;
      }

      #accordionSidebar {
        background-color: <?php echo $colorMenu;
                          ?>;
      }

      .adminSection {
        background-color: black;
      }
      tr{
        background-color: black;
      }
      th{
        background-color: black;
      }
      td{
        background-color: black;
      }

      .section-footer{
  
        padding-top: 0;
      }

    </style>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion toggled" id="accordionSidebar">
      <div class="sider">
        <!-- Sidebar - Brand -->
        
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/ejercicio4/index.php">
            <img src="http://localhost/ejercicio4/iconos/iconosMenu/<?php echo $ico; ?>" height="45px" width="45px">
            <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#discip" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <img src="http://localhost/ejercicio4/iconos/iconosMenu/<?php echo $disc; ?>" height="45px" width="45px">
            <span>Disciplinas</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Disciplinas:</h6>
              <?php
              //include('conexion/conexion.php');
              //include('aMenumodi.php');
              $sentencia2 = $pdo->prepare("SELECT disciplina,titulo FROM `disciplinas`");
              $sentencia2->execute();
              $listaD = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
              //$pdo = null;
              ?>
              <?php foreach ($listaD as $menuD) { ?>
                <a class="collapse-item" href="http://localhost/ejercicio4/disciplinas/<?php echo $menuD['disciplina'] . '.php'; ?>"><?php echo $menuD['titulo'] ?></a>
                <?php $listaD = null;
              } ?>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <img src="http://localhost/ejercicio4/iconos/iconosMenu/<?php echo $compar; ?>" height="45px" width="45px">
            <span>Utilities</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="http://localhost/ejercicio4/maestros.php">Maestros</a>
              <a class="collapse-item" href="http://localhost/ejercicio4/registro.php">Registrarse</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <img src="http://localhost/ejercicio4/iconos/iconosMenu/<?php echo $contac; ?>" height="45px" width="45px">
            <span>Pages</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Login Screens:</h6>
              <a class="collapse-item" href="login.php">Login</a>
              <a class="collapse-item" href="register.html">Register</a>
              <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="#logros">
          <img src="http://localhost/ejercicio4/iconos/iconosMenu/<?php echo $maes; ?>" height="45px" width="45px">
            <span>Logros</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="#discip">
            <i class="fas fa-fw fa-table"></i>
            <span>Disciplinas</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
          <a class="nav-link" href="http://localhost/ejercicio4/seccionVideos.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Videos</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </div>
    </ul>
    <!-- End of Sidebar -->


  <script>
  window.onload = function () {
    var contenedor = document.getElementById('contenedor_carga');

    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0';
  }
</script>