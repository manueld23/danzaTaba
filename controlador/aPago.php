<?php

$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$nombreAlumno = (isset($_POST['nombreAlumno'])) ? $_POST['nombreAlumno'] : "";
$discAlum = (isset($_POST['discAlum'])) ? $_POST['discAlum'] : "";
$fechaPago = (isset($_POST['fechaPago'])) ? $_POST['fechaPago'] : "";
$pago = (isset($_POST['pago'])) ? $_POST['pago'] : "";
$estadoPago = (isset($_POST['estadoPago'])) ? $_POST['estadoPago'] : "";
$desde = (isset($_POST['desde'])) ? $_POST['desde'] : "";
$hasta = (isset($_POST['hasta'])) ? $_POST['hasta'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$mostrarModal = false;

//include('conexion/conexion.php');

switch ($accion) {
    case "guardarPago":

        if ($estadoPago == 1) {
            /** INSERT A LA TABLA DE PAGOS */
            $sentencia = $pdo->prepare("INSERT INTO pagos(idAlumno,idDisciplina,pago,fecha,estado)
                                       VALUES(:idAlumno,:idDisciplina,:pago,:fecha,:estado)");

            $sentencia->bindParam(':idAlumno', $nombreAlumno);
            $sentencia->bindParam(':idDisciplina', $discAlum);
            $sentencia->bindParam(':pago', $pago);
            $sentencia->bindParam(':fecha', $fechaPago);
            $sentencia->bindParam(':estado', $estadoPago);
            $sentencia->execute();

            /**INSERT  A LA TABLA DE bailes*/
            $sentencia = $pdo->prepare("INSERT INTO bailes(id,idDisciplinas) 
                                        VALUES (:id,:idDisciplinas);");
            $sentencia->bindParam(':id', $nombreAlumno);
            $sentencia->bindParam(':idDisciplinas', $discAlum);
            $sentencia->execute();

            /**SELECCIONO LA DISCIPLINA Y LUEGO SE ACTUALIZA LA TABLA DE BAILES */
            $nombreDisciplina = "";
            $sentencia = $pdo->prepare("SELECT disciplinas.id,disciplinas.titulo,bailes.idDisciplinas 
                                    FROM disciplinas INNER JOIN bailes 
                                    ON disciplinas.id = bailes.idDisciplinas
                                    WHERE bailes.idDisciplinas =".$discAlum);
            $sentencia->execute();
            $selectDisci = $sentencia->fetch(PDO::FETCH_LAZY);
            $nombreDisciplina = $selectDisci['titulo'];

            $sentencia = $pdo->prepare("UPDATE bailes INNER JOIN disciplinas 
                                        ON bailes.idDisciplinas = disciplinas.id 
                                        SET bailes.disciplina = :disciplina 
                                        WHERE bailes.id = :id AND idDisciplinas = :idDisciplinas");
            $sentencia->bindParam(':disciplina',$nombreDisciplina);
            $sentencia->bindParam(':id',$nombreAlumno);
            $sentencia->bindParam(':idDisciplinas',$discAlum);
            $sentencia->execute();

            $sentencia = $pdo->prepare("INSERT INTO listas(idAlum,idDisc)VALUE(:idAlum,:idDisc)");
            $sentencia->bindParam(':idAlum',$nombreAlumno);
            $sentencia->bindParam(':idDisc',$discAlum);
            $sentencia->execute();

        }
        if ($estadoPago == 0) {

            //echo "<script>alert('NO PAGADO');</script>";
            $sentencia = $pdo->prepare("INSERT INTO pagos(idAlumno,idDisciplina,pago,fecha,estado)
                                       VALUES(:idAlumno,:idDisciplina,:pago,:fecha,:estado)");

            $sentencia->bindParam(':idAlumno', $nombreAlumno);
            $sentencia->bindParam(':idDisciplina', $discAlum);
            $sentencia->bindParam(':pago', $pago);
            $sentencia->bindParam(':fecha', $fechaPago);
            $sentencia->bindParam(':estado', $estadoPago);
            $sentencia->execute();
        }

        //header('Location: ../admin/adminAlumnos.php');

        break;

    case "editar":

        $sentencia = $pdo->prepare("SELECT * FROM disciplinas WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

        $disciplina = $empleado['disciplina'];
        $titulo = $empleado['titulo'];
        $descripcion = $empleado['descripcion'];
        $imagen = $empleado['imagen'];

        break;

    case "buscarFecha":
        $sentencia = $pdo->prepare("SELECT fecha FROM listas WHERE fecha BETWEEN '{$desde}' 
                                    AND '{$hasta}' AND idDisc =".$discAlum);
        $sentencia->execute();
        $fecha = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $fecha;
    break;
}
