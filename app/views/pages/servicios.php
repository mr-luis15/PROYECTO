<?php

require_once '../../routes/RouteController.php';


session_start();


if (
    !isset($_SESSION['usuario']) ||

    $_SESSION['usuario']['nivel'] != 'Administrador' && $_SESSION['usuario']['nivel'] != 'Secretaria de Ventas' &&
    $_SESSION['usuario']['nivel'] != 'Secretaria de Compras' && $_SESSION['usuario']['nivel'] != 'Tecnico'
) {

    Route::msg('Error');
    exit;
}




$title = "Pedidos";
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Usuario.php';



?>

<div class="main">
    <h2 class="h2">Lista de Servicios por Realizar</h2>
    <hr>
    <div class="card">
        <!-- Recuadro superior con el botón -->
        <div class="recuadro-button">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalServicios">
                <i class="far fa-calendar-plus"></i> Agregar pedido
            </button>

            <button class="btn btn-light" type="button">
                <i class="fas fa-user-plus"></i> Exportar PDF
            </button>
        </div>
        <!-- Tabla con borde separado -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead">
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Telefono Cliente</th>
                        <th>Tecnico</th>
                        <th>Telefono Tecnico</th>
                        <th>Descripcion del Servicio</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        //echo "<td>".$_SESSION['usuario']['nivel']."</td>";

                        ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

<?php


require_once '../resources/layout/footer.php';
require_once '../resources/layout/form_servicios.php';


?>