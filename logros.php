<?php
//session_start();
include('cabecera/menu.php');
include('cabecera/barraAdmin.php');
//include('conexion/conexion.php');
//include('controlador/edit.php');
?>

<?php
$query = $pdo->prepare("SELECT * FROM `card`");
$query->execute();
$listacard = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<section class="section-services section-t8 adminSection">
  <div class="container">

    <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Agregar card</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="controlador/edit.php" enctype="multipart/form-data">

              <div class="form-group">
                <label for="message-text" class="col-form-label">Titulo:</label>
                <input type="color" name="tituloColor" id="tituloColor">
                <input type="text" class="form-control" name="titulo" id="titulo">
              </div> 

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                <input type="color" name="descripColor" id="descripColor">
                <input type="text" class="form-control" name="descripcion" id="descripcion">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Imagen:</label>
                <input type="file" class="form-control" accept="image/*" name="imagen" id="imagen">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Medalla:</label>
                <input type="file" class="form-control" accept="image/*" name="medalla" id="medalla">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="accion" value="agregar" class="btn btn-primary">Guardar cambios</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a" id="logros">Logros</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Agregar card</button>
          </div>
        </div>
      </div>

      <?php foreach ($listacard as $card) { ?>
        <div class="col-md-6">

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/logros/<?php echo $card['imagen']; ?>" class="img-fluid" alt="img-d img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <form action="">
                    <h5 style="color:<?php echo $card['tituloColor']; ?>" class="card-title"><?php echo $card['titulo']; ?></h5>
                    <p style="color:<?php echo $card['descripColor']; ?>" class="card-text"> <?php echo $card['descripcion']; ?> </p>
                  </form><br>
                <?php 
                if($card['medalla'] != ''){?>
                  <blockquote class="blockquote">
                    <div class="medalla text-right">
                      <img src="img/logros/<?php echo $card['medalla'];?>" width="50px">
                    </div>
                  </blockquote>
                <?php }else{ ?>
                  <div></div>
               <?php } ?>

                </div>
              </div>
            </div>
          </div>

          <style>
            .medalla {
              position: absolute;
              bottom: 0px;
              left: 0px;/*A la derecha deje un espacio de 0px*/
              right: 0px;
              z-index: 0;
            }
          </style>

          <a href="#delete_<?php echo $card['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
          <a href="#edit_<?php echo $card['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
          <?php include('modaledit.php'); ?>
          <br><br>
        </div>

      <?php } ?>

    </div>
  </div>
</section>
<?php include('cabecera/pie.php'); ?>