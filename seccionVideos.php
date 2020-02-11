<?php
//session_start();
include('cabecera/menu.php');

if ($_SESSION['verificar'] = true) {
  include('cabecera/barra.php');

}
  include('cabecera/tipouser.php');
//require('conexion/conexion.php');
//require('aVideos.php');
?>

<section class="section-agents section-t8">
  <div class="container">
    <h1 class="text-center">Seccion de videos</h1>

    <?php
    $sentencia2 = $pdo->prepare("SELECT * FROM disciplinas T1 WHERE EXISTS (SELECT * FROM videos T2 WHERE T1.disciplina = T2.nombre)");
    $sentencia2->execute();
    $listaImagenes = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="row">

      <?php foreach ($listaImagenes as $discipl) { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="videos/<?php echo $discipl['disciplina'] . '.php'; ?>">
            <div class="card-box-d">
              <div class="card-img-d" id="cardImagen">
                <img id="cardIm" src="img/disciplinas/<?php echo $discipl['imagen']; ?>" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h6 class="title-d" id="titulo">
                      <form action="">
                      <h4 class="link-two text-center"><?php echo $discipl['titulo']; ?></h4>
                        <!--<a href="videos/<?php echo $discipl['disciplina'] . '.php'; ?>" class="link-two"><?php echo $discipl['titulo']; ?></a>-->
                      </form>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </a><br>
        </div>
      <?php } ?>

    </div>
  </div>
</section>

<?php require('cabecera/pie.php'); ?>