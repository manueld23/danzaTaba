<?php
include('../cabecera/menu.php');
include('../cabecera/barraAdmin.php');
//require('../controlador/aAdminMaes.php');
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<?php
$query = $pdo->prepare("SELECT * FROM `maestros`");
$query->execute();
$listacard = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
  .sectionMaestros {
    background-color: black;
    padding: 0;
  }

  .section-footer {
    background-color: black;
    padding-top: 0;
  }
</style>

<!--/ Cards con Imagenes /-->
<br>
<br><br>
<section class="section-services section-t8 sectionMaestros">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Maestros</h2>
          </div>
        </div>
      </div>

      <?php
      $query = $pdo->prepare("SELECT id,nombre FROM `maestros`");
      $query->execute();
      $maestros = $query->fetchAll(PDO::FETCH_ASSOC); 
      ?>

      <div class="col-md-12">
        <div class="row">

          <div class="form-group col-md-6">
            <select name="maestroDisci" id="maestroDisci" class="form-control form-control-user">
              <option value="">Seleccione un Maestro</option>
              <?php foreach ($maestros as $maes) { ?>
                <option value="<?php echo $maes['id']; ?>"><?php echo $maes['nombre']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <select name="discip" id="discip" class="form-control form-control-user">
              <option value="">Seleccione un estado</option>
            </select>
          </div>

        </div>
        <button class="btn btn-primary" onclick="">guardar</button> <br><br>
      </div>
      <br>

      <?php 
        $query = $pdo->prepare("SELECT M.nombre, GROUP_CONCAT(D.titulo) 
                                FROM discipMaest DM
                                INNER JOIN maestros M ON M.id = DM.idMaes
                                INNER JOIN disciplinas D ON D.id = DM.idDiscp
                                GROUP BY M.id");
        $query->execute();
        $disciMaes= $query->fetchAll();
      ?>

      <div class="table table-resposive">
        <table class="rwd-table table table-hover table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Disciplinas de maestros</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0;
            foreach ($disciMaes as $dm) { ?>
              <tr>
                <th scope="row"><?php echo ++$i; ?></th>
                <td><?php echo $dm['nombre']; ?></td>
                <td><?php echo $dm['GROUP_CONCAT(D.titulo)']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <br>

      <?php foreach ($listacard as $card) { ?>
        <div class="col-md-6">
          <div class="card mb-3 bg-gradient-light" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/maestros/<?php echo $card['imagen']; ?>" class="img-fluid" alt="Responsive image">

              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 style="color:<?php echo $card['tituloColor']; ?>" class="card-title"><b><?php echo $card['nombre']; ?></b></h5>

                  <p style="color:<?php echo $card['descripColor']; ?>" class="card-text"><b>Disciplinas: </b><?php echo $card['disciplina']; ?> </p>
                  <br>
                  <form action="aMaestros.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $card['id']; ?>">
                    <a href='../maestros.php' class='btn btn-info btn-sm'>Ver perfil</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <script>
        $(document).ready(function(e) {
          $("#maestroDisci").change(function() {
            var parametros = "id=" + $("#maestroDisci").val();
            $.ajax({
              data: parametros,
              url: '../controlador/aAdminMaes.php',
              type: 'post',
              beforeSend: function() {
                $("#discip").html("espere");
              },
              success: function(response) {
                $("#discip").html(response);
              },
              error: function(response) {
                alert(response);
              }
            });
          })
        })
      </script>

    </div>
  </div>
</section>
<?php include('../cabecera/pie.php'); ?>