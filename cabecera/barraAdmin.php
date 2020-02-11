<?php

?>

<style>
  @media only screen and (max-width: 700px) {
    .imagenesBarra {
      max-width: 20px;
      max-height: 20px;
    }
  }

  /*@media only screen and (max-width: 850px) and (min-width: 700px) {
    img {
      max-width: 30px;
      max-height: 30px;
    }
  }*/

  /*@media only screen and (min-width: 200px) and (max-width: 388px) {
    img {
      max-width: 13px;
      max-height: 13px;
    }
  }*/
</style>

<!-- Topbar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content" id="barraAdmin">
    <nav class="navbar navbar-expand navbar-dark bg-gray-gris topbar mb-0 static-top shadow fixed-top">
      <!-- Sidebar Toggler (Sidebar) -->
      <div id="sidebarToggle" class="text-center d-md-inline">
        <button class="btn btn-link rounded-circle mr-3">
          <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $me; ?>" height="18px">
        </button>
      </div>
      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn bg-gradient-morado small" type="button">
              <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $buscar; ?>" height="18px">
              <!--<i class="fas fa-search fa-sm"></i>-->
            </button>
          </div>
        </div>
      </form>
      <!-- Topbar Navbar -->
      ADMIN
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle " href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $buscar; ?>" height="18px">
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn bg-gradient-morado small" type="button">
                    <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $buscar; ?>" height="18px">
                    <!--<i class="fas fa-search fa-sm"></i>-->
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <?php

        ?>
        <!--<li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="<?php echo $ba['nombre']; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="fas fa-fw" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $ba['icono']; ?>" alt="">
            </a>
          </li>-->
        <?php
        ?>

        <!-- Nav Item - menus para administrador -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!--<i class="fas fa-tools"></i>-->
            <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $herra; ?>" height="45px" width="45px">
            <!-- Counter - Alerts -->

          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Herramientas
            </h6>

            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/carrusel1.php">
              <div class="mr-3">
                <div class="icon-circle bg-info">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                carrucel1
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/carrusel2.php">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                carrucel2
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/disciplinas.php">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                Disciplinas
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/listaVideos.php">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                Videos
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/menumodi.php">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                Menu
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/barra.php">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <span class="font-weight-bold">Barra</span>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/logros.php">
              <div class="mr-3">
                <div class="icon-circle bg-success">
                  <i class="fas fa-donate text-white"></i>
                </div>
              </div>
              <div>
                Logros
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/redesSociales.php">
              <div class="mr-3">
                <div class="icon-circle bg-success">
                  <i class="fas fa-donate text-white"></i>
                </div>
              </div>
              <div>
                Redes sociales
              </div>
            </a>
          </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!--<i class="fas fa-bell"></i>-->
            <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $noti; ?>" height="45px" width="45px">
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/admin/AdminMaestros.php">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <span class="font-weight-bold">Maestros</span>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/admin/adminAlumnos.php">
              <div class="mr-3">
                <div class="icon-circle bg-success">
                  <i class="fas fa-donate text-white"></i>
                </div>
              </div>
              <div>
                <span class="font-weight-bold">Alumnos</span>
              </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
          </div>
        </li>


        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">

          <a id="messagesDro" role="button" name="button" onclick="myFunction()" class="dropbtn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="badge badge-danger badge-counter" id="notification-count"><?php if ($count > 0) {
                                                                                      echo $count;
                                                                                    } ?></span>
                        <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $men; ?>" height="45px" width="45px">

          </a>

          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" id="">
            <h6 class='dropdown-header'>Message Center</h6>
            <div id="notification-latest"></div>
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
          </div>
          <?php if (isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>
          <?php if (isset($success)) { ?> <div class="success"><?php echo $success; ?></div> <?php } ?>

        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              <?php
              echo $_SESSION['Nombre']; ?></span>
            <img class="img-profile rounded-circle imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $per; ?>" height="45px" width="45px">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="http://localhost/ejercicio4/alumno.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Perfil
            </a>

            <a class="dropdown-item" href="http://localhost/ejercicio4/agregarDatosAlumno.php">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
            <a class="dropdown-item" href="http://localhost/ejercicio4/controlador/cerrar.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Cerrar sesion
            </a>
          </div>
        </li>
      </ul>

    </nav>
    <!-- End of Topbar -->