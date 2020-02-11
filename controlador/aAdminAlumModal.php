<?php
require_once __DIR__ . "/../conexion/conexion.php";

$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$nombreAlum = (isset($_POST['nombreAlum'])) ? $_POST['nombreAlum'] : "";
$apPaternoAlum = (isset($_POST['apPaternoAlum'])) ? $_POST['apPaternoAlum'] : "";
$apMaternoAlum = (isset($_POST['apMaternoAlum'])) ? $_POST['apMaternoAlum'] : "";
$discipAlum = (isset($_POST['discipAlum'])) ? $_POST['discipAlum'] : "";

$selectDiscipAlum = (isset($_POST['selectDiscipAlum'])) ? $_POST['selectDiscipAlum'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {

    case 'adminAlumnoEditar':
    
        $sentencia = $pdo->prepare("UPDATE alumnos INNER JOIN bailes ON alumnos.id = bailes.id 
                                    SET alumnos.nombre = :nombre, 
                                        alumnos.apPaterno = :apPaterno,
                                        alumnos.apMaterno = :apMaterno, 
                                        bailes.idDisciplinas = :idDisciplinas
                                    WHERE alumnos.id = :id");

        $sentencia->bindParam(':nombre', $nombreAlum);
        $sentencia->bindParam(':apPaterno', $apPaternoAlum);
        $sentencia->bindParam(':apMaterno',$apMaternoAlum);
        $sentencia->bindParam(':idDisciplinas',$discipAlum);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        $nombreDisciplina = "";
        $sentencia = $pdo->prepare("SELECT disciplinas.id,disciplinas.titulo,bailes.idDisciplinas 
                                    FROM disciplinas INNER JOIN bailes 
                                    ON disciplinas.id = bailes.idDisciplinas
                                    WHERE bailes.idDisciplinas =".$discipAlum);

        $sentencia->execute();
        $selectDisci = $sentencia->fetch(PDO::FETCH_LAZY);
        $nombreDisciplina = $selectDisci['titulo'];
        //echo $nombreDisciplina;
        
        $sentencia = $pdo->prepare("UPDATE bailes INNER JOIN disciplinas 
                                    ON bailes.idDisciplinas = disciplinas.id
                                    SET bailes.disciplina = :disciplina
                                    WHERE bailes.id = :id");

        $sentencia->bindParam(':disciplina', $nombreDisciplina);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        header('Location: ../admin/adminAlumnos.php');
        break;

    case 'elimiAlumDiscip':
    //echo "<script>alert('hola');</script>";

        $sentencia = $pdo->prepare("DELETE b FROM bailes b INNER JOIN disciplinas d 
                                   ON b.idDisciplinas = d.id 
                                   WHERE b.id = :id AND b.idDisciplinas =".$selectDiscipAlum);
                                
        $sentencia->bindParam(':id',$id);
        $sentencia->execute();

        header('Location: ../admin/adminAlumnos.php');
        break;

}
