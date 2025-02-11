<?php

require_once '../../model/Servicios.php';


if (empty($_POST['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'No se ha recibido el id del servicio']);
    exit;
}

$servicio = new Servicios();
$servicio->setId($_POST['id']);


if ($servicio->setRealizado()) {
    echo json_encode(['status' => 'success', 'title' => 'Realizado', 'message' => 'Se ha marcado como realizado']);
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se ha marcado como realizado. Hubo un error']);
    exit;
}


?>