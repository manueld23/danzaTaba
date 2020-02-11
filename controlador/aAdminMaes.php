<?php

if(isset($_POST['id'])):
    require_once __DIR__ . "/../conexion/conexion.php";
    //$query = $pdo->prepare("SELECT id,titulo FROM `disciplinas` WHERE id =" .$_POST['id']);
    $query = $pdo->prepare("SELECT id,titulo FROM disciplinas D 
                            WHERE NOT EXISTS (SELECT * FROM discipMaest dm WHERE D.id = dm.idDiscp)");
    $query->execute();
    $html = "";

    foreach($query as $q)
    $html.= "<option value='".$q['id']."'>".$q['titulo']."</option>";
    echo $html;
else:
    echo "No hay post";
endif;