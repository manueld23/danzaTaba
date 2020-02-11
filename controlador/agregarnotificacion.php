<?php
include('../conexion/conexion.php');

    $sentencia = $pdo->prepare("SELECT * FROM datos WHERE estado = 0");
    
    $sentencia->execute();
	//$empleado = $sentencia->fetch(PDO::FETCH_LAZY);
	

	$count=0;
	if(!empty($_POST['add'])) {
		
		$autor = (isset($_POST['autor'])) ? $_POST['autor'] : "";
		$correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
		$tema = (isset($_POST['tema'])) ? $_POST['tema'] : "";
		$mensaje = (isset($_POST['mensaje'])) ? $_POST['mensaje'] : "";
		
		
		$sql = $pdo->prepare("INSERT INTO datos(autor,correo,tema,mensaje) VALUES('".$autor."','".$correo."','".$tema."','".$mensaje."')");
		$sql->bindParam(':autor', $autor);
		$sql->bindParam(':correo', $correo);
		$sql->bindParam(':tema', $tema);
		$sql->bindParam(':mensaje', $mensaje);
		$sql->execute();
	}

	$sql2 = $pdo->prepare("SELECT * FROM datos WHERE estado = 0");

$count=mysqli_num_rows($sql2);

	header( 'Location: ../index.php' ) ;
?>
