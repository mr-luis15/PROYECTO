<?php

require_once '../../model/Servicios.php';

print_r($_POST);


if (empty($_POST['cliente']) ||
    empty($_POST['tecnico']) ||
    empty($_POST['descripcion']) ||
    empty($_POST['fecha'])) {
        echo json_encode(['status' => 'error', 'message' => 'No se han recibido algunos datos']);
        exit;
    }


$servicio = new Servicios();

$servicio->setCliente($_POST['cliente']);
$servicio->setTecnico($_POST['tecnico']);
$servicio->setDescripcion($_POST['descripcion']);
$servicio->setFecha($_POST['fecha']);
$servicio->setEstado("No realizado");

exit;












?>