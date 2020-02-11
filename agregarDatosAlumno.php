<?php
require('cabecera/menu.php');
require('cabecera/barraAdmin.php');
require('aAlumno.php');
?>

<section class="section-agents section-t8 alumno">
    <div class="container">

        <form action="">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Alumno:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Disciplina</label>
                <input type="text" class="form-control" accept="image/*" name="imagen">
            </div>
        </form>

    </div>
</section>

<?php
require('cabecera/pie.php');
?>