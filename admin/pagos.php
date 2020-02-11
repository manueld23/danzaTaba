<?php
//session_start();
include('../cabecera/menu.php');
include('../cabecera/barraAdmin.php');
include('../controlador/aPago.php');
?>

<?php
$query = $pdo->prepare("SELECT id,titulo FROM disciplinas");
$query->execute();
$disc = $query->fetchAll(PDO::FETCH_ASSOC);

$consulta = $pdo->prepare("SELECT id,nombre,apPaterno,apMaterno FROM alumnos");
$consulta->execute();
$alumn = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="section-agents section-t8">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pagosModal">
                    Registrar pago de alumno +
                </button>
            </div>

            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="col-md-8">
                        <select name="dis" id="dis" class="form-control form-control-user">
                            <option disabled>Disciplinas</option>
                            <?php foreach ($disc as $di) { ?>
                                <option value="<?php echo $di['id']; ?>"><?php echo $di['titulo']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit">mostrar</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>

        <!-- Modal -->
        <div class="modal fade" id="pagosModal" tabindex="-1" role="dialog" aria-labelledby="pagosModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pagosModalLabel">Agregar Imagenes al carrusel 1</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Alumno:</label>
                                <select name="nombreAlumno" id="nombreAlumno" class="form-control form-control-user">
                                    <option selected>Alumno</option>
                                    <?php foreach ($alumn as $alu) { ?>
                                        <option value="<?php echo $alu['id']; ?>"><?php echo $alu['nombre'], " ", $alu['apPaterno'], " ", $alu['apMaterno']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Disciplina:</label>
                                    <select name="discAlum" id="discAlum" class="form-control form-control-user">
                                        <option value="" selected>Disciplinas</option>
                                        <?php foreach ($disc as $di) { ?>
                                            <option value="<?php echo $di['id']; ?>"><?php echo $di['titulo']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Fecha:</label>
                                    <input type="date" class="form-control" name="fechaPago">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Pago:</label>
                                    <input type="text" class="form-control" name="pago">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Estado:</label>
                                    <select name="estadoPago" id="estadoPago" class="form-control form-control-user">
                                        <option value="" selected>Estado del pago</option>
                                        <option value="1">Pagado</option>
                                        <option value="0">No pagado</option>
                                    </select>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="accion" value="guardarPago" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $dis = (isset($_POST['dis'])) ? $_POST['dis'] : "";;

        $sentencia = $pdo->prepare("SELECT DISTINCT A.nombre,A.apPaterno,A.apMaterno,
                                            B.disciplina,P.pago,P.fecha
                                    FROM alumnos A
                                    INNER JOIN bailes B ON A.id = B.id
                                    INNER JOIN pagos P ON P.idDisciplina = B.idDisciplinas
                                    WHERE B.idDisciplinas =".$dis);
        $sentencia->execute();
        $pagos = $sentencia->fetchAll();
        ?>

        <div class="table table-resposive">
            <table class="rwd-table table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Alumno</th>
                        <th scope="col">Disciplina</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($pagos as $pag) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo ++$i; ?></th>
                            <td><?php echo $pag['nombre'], " ", $pag['apPaterno'], " ", $pag['apMaterno']; ?></td>
                            <td><?php echo $pag['disciplina']; ?></td>
                            <td><?php echo $pag['pago']; ?></td>
                            <td><?php echo $pag['fecha']; ?></td>

                            <td>

                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $carrusel['id']; ?>">
                                    <button type="submit" name="accion" value="editar" class="btn btn-success btn-sm">Editar</button>
                                    <button type="submit" name="accion" class="btn btn-danger btn-sm" value="btnEliminar">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>

    </div>
</section>

<?php include('../cabecera/pie.php'); ?>