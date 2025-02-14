<?php



require_once '../../model/Usuario.php';



if (
    empty($_POST['nombre']) || empty($_POST['telefono']) ||
    empty($_POST['correo']) || empty($_POST['password'])
) {
    echo json_encode(['status' => 'error', 'message' => 'No se han recibido los datos']);
    exit;
}


$usuario = new Usuario();
$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = 'Cliente';
$usuario->password = $_POST['password'];


if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'El correo electronico no es valido']);
    exit;
}


if ($usuario->existeUsuarioByEmail()) {
    echo json_encode(['status' => 'error', 'message' => 'Este correo electronico ya está en uso']);
    exit;
}


if (strlen($usuario->telefono) != 10) {
    echo json_encode(['status' => 'error', 'message' => 'El telefono debe tener 10 digitos']);
    exit;
}


if ($usuario->existeTelefono()) {
    echo json_encode(['status' => 'error', 'message' => 'Este telefono ya esta en uso']);
    exit;
}


$usuario->passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);


if (!$usuario->crear()) {
    echo json_encode(['status' => 'error', 'message' => 'Ha habido un erro al momento de crear el usuario']);
    exit;
}


echo json_encode(['status' => 'success', 'message' => 'Te has registrado con exito']);


?>