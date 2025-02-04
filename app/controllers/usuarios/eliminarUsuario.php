<?php

session_start();
require_once '../../model/Usuario.php';


if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel'] != 'Administrador') {

    echo json_encode(['status' => 'error', 'message' => 'No tienes permiso para realizar esta acción']);
    exit;
}


if (empty($_POST['id'])) {

    echo json_encode(['status' => 'error', 'message' => 'No se ha recibido el ID del usuario']);
    exit;
}


$usuario = new Usuario();
$usuario->setId($_POST['id']);


if ($_SESSION['usuario']['id'] == $usuario->getId()) {

    echo json_encode(['status' => 'error', 'message' => 'No puedes eliminar tu propia cuenta']);
    exit;
}


if (!$usuario->obtenerUsuarioById()) {

    echo json_encode(['status' => 'error', 'message' => 'El usuario no existe']);
    exit;
}


if ($usuario->eliminar()) {

    echo json_encode(['status' => 'success', 'message' => 'Usuario eliminado correctamente']);
} else {
    
    echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el usuario']);
}

?>