<?php
session_start();
include('../conexion/conexion.php');

$usuario = (isset ($_POST['usuario']))?$_POST['usuario']:"";
$contrasenia = (isset($_POST['password']))?$_POST['password']:"";

$sentencia = $pdo->prepare("SELECT id,usuario,contrasenia FROM alumnos 
                           WHERE usuario='" . $usuario . "' 
                           AND contrasenia='" . $contrasenia . "'
                           LIMIT 1");
$sentencia->execute();

$resultado_admin = $pdo->prepare("SELECT `id`,`usuario`, `password` FROM `usuarios` 
                           WHERE `usuario` = '" . $usuario . "'
                           AND `password` = '" . $contrasenia . "'");
$resultado_admin->execute();

$resultado_maestro = $pdo->prepare("SELECT id,usuario,contrasenia FROM maestros 
                                    WHERE usuario='" . $usuario . "' 
                                    AND contrasenia='" . $contrasenia . "'
                                    LIMIT 1");
$resultado_maestro->execute();

$resultado1 = $sentencia->rowCount();
$resultado2 = $resultado_admin->rowCount();
$resultado3 = $resultado_maestro->rowCount();

if ($resultado1==0 && $resultado2==0 && $resultado3==0) {
    echo '<script type="text/javascript">
   alert("El usuario no existe");
   window.location.href="../login.php"; 
 
 </script>';
} else {
    /*caso contrario*/
    $_SESSION['tiempo'] = time(); //Si hay actividad seteamos el valor al tiempo actual
    $admin = $resultado_admin->fetch(PDO::FETCH_ASSOC);
    $user = $sentencia->fetch(PDO::FETCH_ASSOC);
    $maestro = $resultado_maestro->fetch(PDO::FETCH_ASSOC);

    if ($admin['usuario'] == $usuario) {
        $_SESSION['Nombre'] = $admin['usuario'];
        $_SESSION['id'] = $admin['id'];
        $_SESSION['admin'] = true;

        header('location: ../index.php');
        $_SESSION['verificar'] = true;

        exit();
    }if ($user['usuario'] == $usuario) {

        $_SESSION['Nombre'] = $user['usuario'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['user'] = true;

        header('location: ../index.php');
        $_SESSION['verificar'] = true;
        exit();
    }if ($maestro['usuario'] == $usuario){
        $_SESSION['Nombre'] = $maestro['usuario'];
        $_SESSION['id'] = $admin['id'];
        $_SESSION['maestro'] = true;

        header('Location: ../index.php');
        $_SESSION['verificar'] = true;
    }
    else{
        header('location: ../index.php');
    }
}
?>