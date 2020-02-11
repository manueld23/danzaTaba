<!-- Topbar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <nav class="navbar navbar-expand navbar-dark bg-gray-gris topbar mb-0 static-top shadow fixed-top">
      <!-- Sidebar Toggler (Sidebar) -->
      <div id="sidebarToggle" class="text-center d-md-inline">
        <button class="btn btn-link rounded-circle mr-3"><i class="fa fa-bars"></i></button>
      </div>
      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn bg-gradient-morado small" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw morado"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn bg-gradient-morado small" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <script>
          $(".myForm").hide();

          function ShowHideElement() {
            let text = "";

            if ($("#boton").text() === "mostrar") {
              $(".myForm").show();
              text = "ocultar";
            } else {
              $(".myForm").hide();
              text = "mostrar";
            }
            $("#boton").html(text);
          }
        </script>

        <!-- Nav Item - menus para administrador -->
        <li class="nav-item dropdown no-arrow">
          
          <!-- Dropdown - Alerts -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Herramientas
            </h6>

            <a class="dropdown-item d-flex align-items-center" href="carrusel1.php">
              <div class="mr-3">
                <div class="icon-circle bg-info">
                  <!--<img class="fas fa-fw" src="img/carrucel1.png"></img>-->
                </div>
              </div>
              <div>
                Ubicacion
              </div>
            </a>
          </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              Iniciar sesion</span>
            <img class="img-profile rounded-circle" src="http://localhost/ejercicio4/iconos/icoDanza.png">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="http://localhost/ejercicio4/login.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Login
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
              acerca de..
            </a>
          </div>
        </li>
      </ul>

    </nav>
    <!-- End of Topbar -->