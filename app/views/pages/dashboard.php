<?php

session_start();

$title = "Dashboard | Vista Principal";
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';


switch ($_SESSION['usuario']['nivel']) {

    case 'Administrador':
        require_once '../resources/layout/dashboard-administrador.php';
        break;

    case 'Secretaria de Compras':
        require_once '../resources/layout/dashboard-secretaria-compras.php';
        break;

    case 'Secretaria de Ventas':
        require_once '../resources/layout/dashboard-secretaria-ventas.php';
        break;

    case 'Tecnico':
        require_once '../resources/layout/dashboard-tecnico.php';
        break;

    default:
        header('Location: Error.php');
        break;
}

require_once '../resources/layout/footer.php';
