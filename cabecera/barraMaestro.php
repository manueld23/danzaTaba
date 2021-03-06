<style>
  @media only screen and (max-width: 700px) {
    .imagenesBarra {
      max-width: 20px;
      max-height: 20px;
    }
  }
  
  .navbar {
    background-color: <?php echo $color;
                      ?>;
  }
</style>
<!-- Topbar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <nav class="navbar navbar-expand navbar-dark bg-gray-gris topbar mb-0 static-top shadow fixed-top">
      <!-- Sidebar Toggler (Sidebar) -->
      <div id="sidebarToggle" class="text-center d-md-inline">
        <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $me; ?>" height="18px">
      </div>
      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn bg-gradient-morado small" type="button">
              <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $buscar; ?>" height="18px">
            </button>
          </div>
        </div>
      </form>
      <!-- Topbar Navbar -->
      Maestro
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                  </button>
                </div>
              </div>
            </form>
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
            <a class="dropdown-item d-flex align-items-center" href="http://localhost/ejercicio4/maestros/listaD.php">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <span class="font-weight-bold">Mis disciplinas</span>
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
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="imagenesBarra" src="http://localhost/ejercicio4/iconos/iconosBarra/<?php echo $men; ?>" height="45px" width="45px">

          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Message Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                <div class="status-indicator bg-success"></div>
              </div>
              <div class="font-weight-bold">
                <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                <div class="small text-gray-500">Emily Fowler · 58m</div>
              </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
          </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>
        <?php 
        $id = $_SESSION['id'];
        $sentencia6 = $pdo->prepare("SELECT imagenUsuario FROM alumnos WHERE id =".$id."");
        $sentencia6->execute();
        $per = $sentencia6->fetch(PDO::FETCH_LAZY);
        $alum = $per['imagenUsuario'];
        ?>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              <?php
              echo $_SESSION['Nombre'];
              ?></span>
            <img class="img-profile rounded-circle imagenesBarra" src="http://localhost/ejercicio4/img/alumnos/<?php echo $alum; ?>" height="45px" width="45px">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="http://localhost/ejercicio4/alumno.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Perfil
            </a>

            <a class="dropdown-item" href="#">
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