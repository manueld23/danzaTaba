<?php
//session_start();
include('../cabecera/menu.php');
include('../cabecera/barraMaestro.php');
include('../controlador/aPago.php');
?>

<section class="section-agents section-t8 adminSection">
    <div class="container">
        <?php
        $sql = $pdo->prepare("SELECT DISTINCT idDisc,titulo,imagen FROM listas INNER JOIN disciplinas 
                              ON listas.idDisc = disciplinas.id");
        $sql->execute();
        $maesDisci = $sql->fetchAll();
        ?>

        <style>
            .flip-card {
                background-color: transparent;
                width: 250px;
                height: 250px;
                perspective: 1000px;
            }

            .flip-card-inner {
                position: relative;
                width: 100%;
                height: 100%;
                text-align: center;
                transition: transform 0.6s;
                transform-style: preserve-3d;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            }

            .flip-card:hover .flip-card-inner {
                transform: rotateY(180deg);
            }

            .flip-card-front,
            .flip-card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                backface-visibility: hidden;
            }

            .flip-card-front {
                background-color: #bbb;
                color: black;
            }

            .flip-card-back {
                background-color: #2980b9;
                color: white;
                transform: rotateY(180deg);
            }
        </style>

        <?php foreach ($maesDisci as $md) { ?>
            <div class="col-md-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="../img/disciplinas/<?php echo $md['imagen']; ?>" alt="Avatar" style="width:250px;height:250px;">
                        </div>
                        <div class="flip-card-back">
                            <form action="listas.php" method="GET">

                                <input type="hidden" name="discp" id="discp" value="<?php echo $md['idDisc']; ?>">
                                <button type="submit" class="btn btn-success"><?php echo $md['titulo']; ?></button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>

    </div>
</section>

<?php include('../cabecera/pie.php'); ?>