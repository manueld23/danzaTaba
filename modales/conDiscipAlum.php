<?php include('../controlador/aAdminAlumModal.php');

$sentencia2 = $pdo->prepare("SELECT id,disciplina,idDisciplinas FROM `bailes` WHERE id=" . $cDA['id']);
$sentencia2->execute();
$masDiscip = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Editar -->
<div class="modal fade bd-example-modal-lg" id="editDiscipAlum_<?php echo $cDA['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Editar card</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data" action="../controlador/aAdminAlumModal.php?id=<?php echo $cDA['id']; ?>">

                        <input type="hidden" id="id" name="id" value="<?php echo $cDA['id']; ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Titulo:</label>
                                <input type="text" class="form-control" id="nombreAlum" name="nombreAlum" value="<?php echo $cDA['nombre']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Apellido paterno:</label>
                                <input type="text" class="form-control" id="apPaternoAlum" name="apPaternoAlum" value="<?php echo $cDA['apPaterno']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select id="selectDiscipAlum" name="selectDiscipAlum" class="form-control form-control-user">
                                    <option value="" disabled>Disciplinas</option>
                                    <?php foreach ($masDiscip as $mD) { ?>
                                        <option value="<?php echo $mD['idDisciplinas']; ?>"><?php echo $mD['disciplina']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><br>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                        <button type="submit" name="accion" value="adminAlumnoEditar" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</button>
                        <button type="submit" name="accion" value="elimiAlumDiscip" class="btn btn-danger"><span class="fa fa-check"></span>Eliminar de disciplina</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>