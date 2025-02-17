<?php
session_start();


require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';



if ($_SESSION['usuario']['nivel'] != 'Administrador') {
    echo json_encode(['status' => 'error', 'message' => 'No tienes permitido hacer esta accion']);
}



if (!validarDatosUsuario($_POST, 'crear')) {
    enviarRespuesta('error', 'Nos e han recibido todos los datos');
    exit;
}



$usuario = new Usuario();

$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->codigo = $_POST['codigo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = $_POST['nivel'];
$usuario->password = $_POST['password'];



//RECORDAR AGREGAR UN SCRIPT QUE CREE UNA CONTRASEÑA AL AZAR Y LUEGO LA ENVIÉ AL CORREO ELECTRONICO DADO POR EL USUARIO


//TAMBIEN RECORDAR HACER UNA ACCION PARA CAMBIAR LA CONTRASEÑA DEL USUARIO A SU GUSTO




if (!$usuario->esNivelValido()) {

    echo json_encode(['status' => 'error', 'message' => 'No tienes permiso para realizar esta acción']);
    exit;
}




if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {

    echo json_encode(['status' => 'error', 'message' => 'El correo no es valido']);
    exit;
}




if ($usuario->existeUsuarioById()) {

    echo json_encode(['status' => 'error', 'message' => 'Ya existe este usuario']);
    exit;
}



if ($usuario->existeUsuarioByEmail()) {

    echo json_encode(['status' => 'error', 'message' => 'Ya existe un usuario con este correo']);
    exit;
}



if (strlen($usuario->telefono) != 10) {

    echo json_encode(['status' => 'error', 'message' => 'El telefono debe tener 10 digitos']);
    exit;
}



if (!esTelefonoValido($usuario->telefono)) {

    echo json_encode(['status' => 'error', 'message' => 'El telefono no es valido. Debe contener numeros']);
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
