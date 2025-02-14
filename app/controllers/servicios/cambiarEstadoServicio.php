<?php

require_once '../../model/Servicios.php';


if (empty($_POST['id'])) {
    
    echo json_encode(['status' => 'error', 'message' => 'No se ha recibido el id del servicio']);
    exit;
}


$servicio = new Servicios();

$servicio->setId($_POST['id']);
$estado = $_POST['estado'];



if ($estado == "Realizado") {


    if ($servicio->cambiarEstadoServicio($estado)) {

        echo json_encode(['status' => 'success', 'title' => 'Realizado', 'message' => 'Se ha marcado como realizado']);
        exit;
    }
    
    echo json_encode(['status' => 'error', 'message' => 'No se ha marcado. Hubo un error']);
    exit;
    
}

if ($estado == "No realizado") {

    if ($servicio->cambiarEstadoServicio($estado)) {
        
        echo json_encode(['status' => 'success', 'title' => 'Marcado como No realizado', 'message' => 'Se ha marcado como No realizado']);
        exit;
    }
    
    echo json_encode(['status' => 'error', 'message' => 'No se ha marcado. Hubo un error']);
    exit;
    
}

?>