<?php
//session_start();

$sesion = false;
include('cabecera/menu.php');

if ($_SESSION['verificar'] = true) {
  include('cabecera/barra.php');
}
include('cabecera/tipouser.php');

//include('cabecera/menu.php');

//include('cabecera/barraAdmin.php');
//include('pruebas.php');
//include('cabecera/tipouser.php');
?>

<?php
$query = $pdo->prepare("SELECT * FROM `carrusel1`");
$query->execute();
$carrusel1 = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!--/ Carousel Star /-->
<div class="intro intro-carousel">
  <div id="carousel" class="owl-carousel owl-theme">

    <?php foreach ($carrusel1 as $carrus) { ?>
      <!--<div class="carousel-item-a intro-item bg-image" style="background-image: url(img/danza.jpg)">-->
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/carrusel/<?php echo $carrus['imagen']; ?>)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top" style="color: <?php echo $carrus['tituloC']; ?>"> <?php echo $carrus['titulo']; ?>
                      <br> <span style="color: <?php echo $carrus['numeroC']; ?>"><?php echo $carrus['numero']; ?></span></p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b" style="color: <?php echo $carrus['numeroDC']; ?>"><?php echo $carrus['numerodos']; ?> </span> <span style="color: <?php echo $carrus['subtituloC']; ?>"><?php echo $carrus['subtitulo']; ?></span>
                      <br> <span style="color: <?php echo $carrus['subdosC']; ?>"><?php echo $carrus['subdos']; ?></span></h1>
                    <p class="intro-subtitle intro-price">

                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>
<!--/ Carousel end /-->

<?php
$query = $pdo->prepare("SELECT * FROM `card`");
$query->execute();
$listacard = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
  .section-services {
    background-color: black;
    padding: 0;
  }

  .section-footer {
    background-color: black;
    padding-top: 0;
  }
</style>

<!--/ Cards con Imagenes /-->
<section class="section-services section-t8">
  <br>
  <br>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a" id="logros">Logros</h2>
          </div>
        </div>
      </div>

      <?php foreach ($listacard as $card) { ?>
        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/logros/<?php echo $card['imagen']; ?>" class="img-fluid" alt="Responsive image">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 style="color:<?php echo $card['tituloColor']; ?>" class="card-title"><?php echo $card['titulo']; ?></h5>
                  <p style="color:<?php echo $card['descripColor']; ?>" class="card-text"> <?php echo $card['descripcion']; ?> </p>
                  <br>
                  <?php
                  if ($card['medalla'] != '') { ?>
                    <blockquote class="blockquote">
                      <div class="medalla text-right">
                        <img src="img/logros/<?php echo $card['medalla']; ?>" width="50px">
                      </div>
                    </blockquote>
                  <?php } else { ?>
                    <div></div>
                  <?php } ?>
                </div>
              </div>
              <style>
                .medalla {
                  position: absolute;
                  bottom: 0px;
                  left: 0px;
                  /*A la derecha deje un espacio de 0px*/
                  right: 0px;
                  z-index: 0;
                }
              </style>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>
<!--/ Final de cards con imagenes /-->

<!--
<section>
  <div id="wowslider-container1">
    <div class="ws_images">
      <ul>
        <li><img src="data1/images/danza4.jpg" alt="danza4" title="danza4" id="wows1_0" /></li>
        <li><a href="http://wowslider.net"><img src="data1/images/imagen3.png" alt="image slider" title="imagen3" id="wows1_1" /></a></li>
        <li><img src="data1/images/peces.jpg" alt="peces" title="peces" id="wows1_2" /></li>
      </ul>
    </div>
    <div class="ws_thumbs">
      <div>
        <a href="#" title="danza4"><img src="data1/tooltips/danza4.jpg" alt="" /></a>
        <a href="#" title="imagen3"><img src="data1/tooltips/imagen3.png" alt="" /></a>
        <a href="#" title="peces"><img src="data1/tooltips/peces.jpg" alt="" /></a>
      </div>
    </div>
    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">jquery image carousel</a> by WOWSlider.com v8.8</div>
    <div class="ws_shadow"></div>
  </div>
  <script type="text/javascript" src="engine1/wowslider.js"></script>
  <script type="text/javascript" src="engine1/script.js"></script>
</section> -->

<?php
$query = $pdo->prepare("SELECT * FROM `carrusel2`");
$query->execute();
$carrusel2 = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!--
<section>
  <div id="wowslider-container1">
    <div class="ws_images">
      <ul>
        <li><img src="data1/images/danza4.jpg" alt="danza4" title="danza4" id="wows1_0" /></li>
        <li><a href="http://wowslider.net"><img src="data1/images/imagen3.png" alt="image slider" title="imagen3" id="wows1_1" /></a></li>
        <li><img src="data1/images/peces.jpg" alt="peces" title="peces" id="wows1_2" /></li>
      </ul>
    </div>
    <div class="ws_thumbs">
      <div>
        <a href="#" title="danza4"><img src="data1/tooltips/danza4.jpg" alt="" /></a>
        <a href="#" title="imagen3"><img src="data1/tooltips/imagen3.png" alt="" /></a>
        <a href="#" title="peces"><img src="data1/tooltips/peces.jpg" alt="" /></a>
      </div>
    </div>
    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">jquery image carousel</a> by WOWSlider.com v8.8</div>
    <div class="ws_shadow"></div>
  </div>
  <script type="text/javascript" src="engine1/wowslider.js"></script>
  <script type="text/javascript" src="engine1/script.js"></script>
</section>-->

<?php
$sentencia2 = $pdo->prepare("SELECT * FROM `disciplinas`");
$sentencia2->execute();
$listaImagenes = $sentencia2->fetchAll(PDO::FETCH_ASSOC);

?>
<style>
  #titulo {
    font-size: medium;
  }

  #telefono {
    font-size: small;
  }

  #correo {
    font-size: small;
  }

  #cardIm {
    max-width: 100%;
    border-radius: 20px;
  }

  @media (min-width: 768px) {
    .card-img-d {
      max-width: 100%;
    }
  }
</style>
<!--/ Disciplinas Star /-->
<section class="section-services section-t8">
  <div class="container">
    <br>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="text-center col-md-12" id="discip">Disciplinas</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <?php foreach ($listaImagenes as $discipl) { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="disciplinas/<?php echo $discipl['disciplina'] . '.php'; ?>">
            <div class="card-box-d">
              <div class="card-img-d" id="cardImagen">
                <img id="cardIm" src="img/disciplinas/<?php echo $discipl['imagen']; ?>" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h6 class="title-d" id="titulo">
                      <form action="">
                        <h6 class="link-two"><?php echo $discipl['titulo']; ?></h6>
                        <!--<a href="disciplinas/<?php echo $discipl['disciplina'] . '.php'; ?>" class="link-two"><?php echo $discipl['titulo']; ?></a>-->
                      </form>
                    </h6>
                  </div>
                </div>

                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    <?php echo $discipl['descripcion']; ?>
                  </p>
                </div>

              </div>
            </div>
          </a><br>
        </div>
      <?php } ?>

    </div>
  </div>
</section>

<?php
include('cabecera/pie.php');
/*
Usuario y contraseña
Nombre del sitio web: tabaDanza
Contraseña del sitio: Ab123456++*/
?>