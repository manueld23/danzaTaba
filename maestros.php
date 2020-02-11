<?php
include('cabecera/menu.php');
include('cabecera/barra.php');
include('conexion/conexion.php');
?>

<section class='section-agents section-t8'>
    <div class="col-md-4 container text-center">
        <img src="img/baile2.jpg" alt="" width="300"><br><br>

        <?php 
           $sentencia = $pdo->prepare("SELECT * FROM maestros WHERE id= 2");
           $sentencia->execute();
           $listaMaestros = $sentencia->fetch(PDO::FETCH_LAZY);
        ?>

        <form action="">

            <div class="row form-group">
                <div class="col-md-3">
                    <label>Nombre:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $listaMaestros['nombre'];?>">
                </div>

            </div>

            <div class="row form-group">
                <div class="col-md-3">
                    <label>Disciplina: </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="disciplina" class="form-control" value="<?php echo $listaMaestros['disciplina'];?>">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-3">
                    <label>Biografia:</label>
                </div>
                <div class="col-md-9">
                    <textarea type="text" name="biografia" class="form-control" ><?php echo $listaMaestros['biografia'];?></textarea>
                </div>
            </div>

        </form>


    </div>
</section>

<?php include('cabecera/pie.php'); ?>