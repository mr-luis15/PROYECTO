<?php

require_once '../../model/Servicios.php';


if (empty($_POST['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'No se ha recibido el id del servicio']);
    exit;
}

$servicio = new Servicios();
$servicio->setId($_POST['id']);


if ($servicio->eliminar()) {
    echo json_encode(['status' => 'success', 'title' => 'ELiminado', 'message' => 'Se ha eliminado el servicio']);
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se ha eliminado. Hubo un error']);
    exit;
}


?>