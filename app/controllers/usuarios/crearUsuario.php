<?php

require_once '../../model/Usuario.php';
//require_once '../../routes/RouteController.php';

if (
    !empty($_POST['id']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['telefono']) &&
    !empty($_POST['correo']) &&
    !empty($_POST['password']) &&
    !empty($_POST['nivel']) 
) {
    echo json_encode(['status' => 'error', 'message' => 'No se han recibido los datos']);
    exit;
}


$usuario = new Usuario();
$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = $_POST['nivel'];
$usuario->password = $_POST['password'];


if (!$usuario->esNivelValido()) {
    echo json_encode(['status' => 'error', 'message' => 'No tienes permiso para realizar esta acción']);
    exit;
}

if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'El correo no es valido']);
    exit;
}

if ($usuario->existeUsuario()) {
    echo json_encode(['status' => 'error', 'message' => 'Ya existe este usuario']);
    exit;
}

if (strlen($usuario->telefono) != 10) {
    echo json_encode(['status' => 'error', 'message' => 'El telefono debe tener 10 digitos']);
    exit;
}

if ($usuario->existeTelefono()) {
    echo json_encode(['status' => 'error', 'message' => 'Este telefono ya esta registrado en otro usuario. Usa otro telefono.']);
    exit;
}

$usuario->passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);

if (!$usuario->crear()) {
    echo json_encode(['status' => 'error', 'message' => 'Ha habido un error. El usuario no se ha creado.']);
    exit;
} else {
    echo json_encode(['status' => 'success', 'message' => 'Agregado con exito.']);
    exit;
}

?>
