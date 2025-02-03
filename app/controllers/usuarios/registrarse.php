<?php

require_once '../../model/Usuario.php';
require_once '../../routes/RouteController.php';

//print_r($_POST);

if (
    empty($_POST['nombre']) && empty($_POST['telefono']) &&
    empty($_POST['correo']) && empty($_POST['password'])
) {
    echo "No se han recibido algunos datos";
    exit;
}

$usuario = new Usuario();
$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = 'Cliente';
$usuario->password = $_POST['password'];

if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {
    echo "El correo electronico no es valido";
    exit;
}

if ($usuario->existeUsuario()) {
    echo "Ya existe este usuario";
    exit;
}

if (!strlen($usuario->telefono) != 10) {
    echo "El telefono debe tener 10 digitos";
}

if ($usuario->existeTelefono()) {
    echo "Este telefono ya esta registrado";
    exit;
}

$usuario->passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);

if (!$usuario->crear()) {
    echo "No se ha creado";
    exit;
}

Route::view('login');
