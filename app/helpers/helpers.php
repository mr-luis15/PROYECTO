<?php

function nivelRequerido($nivel) {

    if($_SESSION['usuario']['nivel'] != $nivel) {
        header("Location: ../../views/pages/login.php");
    }
}

function setTitle($titulo) {

    global $title;
    $title = $titulo;

}

function redirigirPorNivel($nivel) {
    
    switch ($nivel) {

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
}






function verificarNivel($nivel) {
    if (
        !isset($_SESSION['usuario']) ||
    
        $nivel != 'Administrador' && $nivel != 'Secretaria de Ventas' &&
    
        $nivel != 'Secretaria de Compras' && $nivel != 'Tecnico'
    ) {
    
        Route::msg('Error');
        exit;
    }
}

?>