<?php
include('../conexion/conexion.php');

 $sql= $pdo->prepare("UPDATE datos SET estado = 1 WHERE estado = 0");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("SELECT * FROM datos ORDER BY id DESC limit 5");
      $sql->execute();
      $result = $sql->fetchAll(PDO::FETCH_ASSOC);

$response='';
    foreach ($result as $row) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<a class='dropdown-item d-flex align-items-center' href='mensajes.php?id=".$row['id']."'>" 
							 ."<div class='dropdown-list-image mr-3'>
							    <img class='rounded-circle' src='https://source.unsplash.com/fn_BT9fwg_E/60x60' alt=''>
							     <div class='status-indicator bg-success'></div>
							    </div>"  ."<div class='font-weight-bold'>"	
							    ."<div class='small text-gray-500'>". $row["autor"] . " - <span class='small text-gray-500'>". $fechaFormateada . "</span> </div>" . 
									"<div class='text-truncate'>" . $row["mensaje"]  .
									 "</div>" 
							  ."</div>" .
							"</a>";
}
if(!empty($response)) {
	print $response;
}

?>