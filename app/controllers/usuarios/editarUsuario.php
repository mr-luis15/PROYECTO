<?php

session_start();


require_once '../../model/Usuario.php';
require_once '../../routes/RouteController.php';


if (
    !isset($_SESSION['usuario']) ||

    $_SESSION['usuario']['nivel'] != 'Administrador'
) {

    echo "No tienes permitido realizar esta acccion";
    exit;
}


if (
    !isset($_POST['id']) && !isset($_POST['nombre']) &&
    !isset($_POST['correo']) && !isset($_POST['telefono']) &&
    !isset($_POST['nivel'])
) {
    echo "No se han recibido los datos";
    exit;
}


$usuario = new Usuario();
$usuario->setId($_POST['id']);
$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = $_POST['nivel'];


if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {
    echo "El correo electronico no es valido";
    exit;
}


if (strlen($usuario->telefono) != 10) {
    echo "El telefono debe tener 10 digitos";
}


$resultado = $usuario->obtenerUsuarioById();
foreach ($resultado as $datos) {

    if ($_SESSION['usuario']['id'] === $datos['id_usuario']) {
        echo "No puedes modificarte a ti mismo desde tu misma cuenta";
        exit;
    }


    if ($usuario->correo != $datos['correo']) {
        if ($usuario->existeUsuarioByEmail()) {
            echo "Ya existe este usuario";
            exit;
        }
    }


    if ($usuario->telefono != $datos['telefono']) {
        if ($usuario->existeTelefono()) {
            echo "Este telefono ya esta registrado";
            exit;
        }
    }
}


if (!$usuario->esNivelValido()) {
    echo "Este nivel de usuario no es valido";
    exit;
}


if (!$usuario->editar()) {
    echo "Ha habido un error. No se modific+o el usuario";
    exit;
}


switch ($usuario->nivel) {

    case 'Administrador':
        Route::view('empleados');
        break;

    case 'Empleado':
        Route::view('empleados');
        break;

    case 'Secretaria de Compras':
        Route::view('empleados');
        break;

    case 'Secretaria de Ventas':
        Route::view('empleados');
        break;

    case 'Tecnico':
        Route::view('tecnicos');
        break;

    case 'Cliente':
        Route::view('clientes');
        break;

    default:
        echo "No es valido";
}
