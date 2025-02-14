<?php

session_start();

require_once '../../model/Servicios.php';

//print_r($_POST);


if (empty($_POST['cliente']) ||
    empty($_POST['tecnico']) ||
    empty($_POST['descripcion']) ||
    empty($_POST['direccion']) ||
    empty($_POST['fecha'])) {
        echo json_encode(['status' => 'error', 'message' => 'No se han recibido algunos datos']);
        exit;
    }


$servicio = new Servicios();

$servicio->setCliente($_POST['cliente']);
$servicio->setTecnico($_POST['tecnico']);
$servicio->setDescripcion($_POST['descripcion']);
$servicio->setDireccion($_POST['direccion']);
$servicio->setFecha($_POST['fecha']);
$servicio->setEstado("No realizado");


if (strlen($servicio->getDescripcion()) > 255) {
    echo json_encode(['status' => 'error', 'message' => 'La descripcion debe tener menos de 255 caracteres']);
    exit;
}

if ($servicio->crear()) {
    echo json_encode(['status' => 'success', 'message' => 'Se ha agregado el nuevo servicio']);
    exit;
} 

echo json_encode(['status' => 'error', 'message' => 'No se ha agregado el servicio']);


?>