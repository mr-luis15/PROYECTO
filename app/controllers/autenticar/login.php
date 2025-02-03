<?php

require_once '../../routes/RouteController.php';
require_once '../../model/Usuario.php';


$usuario = new Usuario();
$usuario->correo = $_POST['correo'];
$usuario->password = $_POST['password'];


if (!$usuario->existeUsuario()) {
    echo "No existe este usuario"; //Intentar retornar una alerta
    exit;
}

$usuario->obtenerPasswordHash();

if (!password_verify($usuario->password, $usuario->passwordHash)) {
    echo "Contraseña incorrecta";
    exit;
}

$datos = $usuario->obtenerDatos();

if (!$datos) {
    echo "No se han obtenido los datos";
    exit;
}

session_start();

$_SESSION['usuario'] = [
    'id' => $datos->id_usuario,
    'nombre' => $datos->nombre,
    'correo' => $datos->correo,
    'nivel' => $datos->nivel,
    'telefono' => $datos->telefono
];

switch ($datos->nivel) {

    case 'Administrador':
        Route::view('dashboard');
        break;

    case 'Empleado':
        Route::view('dashboard');
        break;

    case 'Secretaria de Compras':
        Route::view('dashboard');
        break;

    case 'Secretaria de Ventas':
        Route::view('dashboard');
        break;

    case 'Tecnico':
        Route::view('dashboard');
        break;

    case 'Cliente':
        Route::view('clientes');
        break;

    default:
        Route::view('404');
        break;
}
