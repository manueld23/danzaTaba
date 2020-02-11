<?php
//session_start();
include('../cabecera/menu.php');
include('../cabecera/barraMaestro.php');
include('../controlador/aPago.php');
?>

<section class="section-agents section-t8">
    <div class="container-fluid">

        <?php
        $idDisc = (isset($_GET['discp'])) ? $_GET['discp'] : "";

        $sql = $pdo->prepare("SELECT DISTINCT A.nombre,A.apPaterno,A.apMaterno, B.disciplina
                              FROM alumnos A INNER JOIN bailes B 
                              ON A.id = B.id INNER JOIN listas L 
                              ON L.idAlum = B.id WHERE B.idDisciplinas =" . $idDisc);
        $sql->execute();
        $listas = $sql->fetchAll(PDO::FETCH_ASSOC);
        $disc = "";
        foreach ($listas as $ma) {
            $disc = $ma['disciplina'];
        }

        $sql = $pdo->prepare("SELECT D.titulo,M.nombre FROM disciplinas D
                              INNER JOIN discipMaest dm ON dm.idDiscp = D.id
                              INNER JOIN maestros M ON M.id = dm.idMaes
                              WHERE D.id = " . $idDisc);
        $sql->execute();
        $disMaes = $sql->fetchAll();
        $maestro = "";
        foreach ($disMaes as $maes) {
            $maestro = $maes['nombre'];
        }

        /*$sql2 = $pdo->prepare("SELECT idAlum,idDisc,fecha FROM listas WHERE idDisc =" . $idDisc);*/
        $sql2 = $pdo->prepare("SELECT DISTINCT fecha,asistencia FROM listas WHERE fecha BETWEEN '{$desde}' 
                               AND '{$hasta}' AND idDisc =".$idDisc);
        $sql2->execute();
        $fecha2 = $sql2->fetchAll();

        $sentencia = $pdo->prepare("SELECT DISTINCT fecha,asistencia FROM listas WHERE fecha BETWEEN '{$desde}' 
                                    AND '{$hasta}' AND idDisc =".$idDisc);
        $sentencia->execute();
        $fecha = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h5 class="text-center">LISTA DE ASISTENCIA</h5><br>

        <div class="col-md-12">
            <form action="" method="POST">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">desde:</label>
                        <input type="date" id="desde" name="desde" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Hasta: </label>
                        <input type="date" id="hasta" name="hasta" class="form-control">

                        <button type="submit" name="accion" value="buscarFecha" id="buscarFecha" onclick="onload();">buscar</button>
                        <button type="button" id="reset"></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4>Disciplina: <u><?php echo $disc; ?></u></h4>
            </div>
            <div class="col-md-5">
                <h4>Profesor (A): <u><?php echo $maestro; ?></u> </h4>
            </div>
            <div class="col-md-3">
                <h4>Mes: <u>Enero</u></h4>
            </div>
        </div>

        <style>
            .lista {
                width: 10%;
                height: 10%;
            }

            th {
                text-align: center;
            }

            .mensusalidad {
                width: 10%;
                height: 10%;
            }

            .folio {
                width: 5%;
                height: 5%;
            }

            .numeroA {
                width: 2%;
                height: 2%;
            }
        </style>

        <div class="table table-resposive">
            <table class="rwd-table table table-hover" border="1">
                <thead class="thead-dark lista">
                    <tr>
                        <th colspan="2" class="mensualidad">MENSUALIDAD</th>
                        <th rowspan="2" class="align-middle numeroA">No.</th>
                        <th rowspan="2" class="align-middle">Nombre</th>
                        <?php foreach ($fecha as $fec) { ?>
                            <th rowspan="2" id="fechas"><?php echo $fec['fecha']; ?></th>
                        <?php } ?>

                    </tr>
                    <tr>
                        <th class="folio">FOLIO</th>
                        <th class="folio">FECHA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($listas as $li) {?>
                        <tr>
                            <th></th>
                            <td></td>
                            <td scope="row"><?php echo ++$i; ?></td>
                            <td><?php echo $li['nombre'], " ", $li['apPaterno'], " ", $li['apMaterno']; ?></td>
                            <?php foreach ($fecha as $fec) {
                                if ($fec['asistencia'] == 1) { ?>
                                    <td>
                                        <input type="checkbox" value="<?php echo $fec['asistencia']; ?>" name="fechascheck[]" class="form-control" checked="checked">
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <input type="checkbox" name="fechascheck[]" class="form-control">
                                    </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>

        <script>
            /*
            $(document).ready(function(){
               $('#desde').datepicker();
               $('#hasta').datepicker();
               onload();

               $('#reset').on('click', function(){
                   location.reload();
               });
            });

            function onload() {
                $desde = $('#desde').val();
                $hasta = $('#hasta').val();
                $('#fechas').empty();
                $loader = $('<tr><td colspan="4"><center>Cargando....</center></td></tr>');
                $loader.appendTo('#fechas');
            }*/
        </script>

    </div>
</section>

<?php include('../cabecera/pie.php'); ?>