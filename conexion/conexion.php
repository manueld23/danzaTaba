<?php
include('config.php');
define('SITE_ERROR', __DIR__);
$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
            array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
        );
        //echo "conexion exitosa";
} catch (PDOException $e) {
    echo "error";
}

$count = 0;
?>