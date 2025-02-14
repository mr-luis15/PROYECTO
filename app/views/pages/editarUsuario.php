<?php

//RECORDAR EDITAR ESTA VISTA PARA QUE APAREZCAN 2 RECUADROS, UNO DONDE APAREZCA UNA TABLA CON LOS DATOS DE LOS USUARIOS SIN PODER MODIFICAR Y OTRO DE UN FORMULARIO CONDE APAREZCA UN FORMULARIO DONDE LOS DATOS SE PUEDAN MODIFICAR

session_start();

if (!isset($_GET['id'])) {
    echo "Error al recibir el ID";
    exit;
}

$title = "Modificar Usuario";
require_once '../../model/Usuario.php';
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';


$usuario = new Usuario();
$usuario->setId($_GET['id']);


if ($usuario->obtenerUsuarioById() === false) {

    echo "Ha habido un error. No se encontró el usuario";
    exit;
}


$resultado = $usuario->obtenerUsuarioById();
foreach ($resultado as $datos):


?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Modificar Usuario</h3>
                        <form action="<?php echo Route::user('editarUsuario'); ?>" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" value="<?php echo $datos['nombre'] ?>" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" value="<?php echo $datos['telefono'] ?>" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" value="<?php echo $datos['correo'] ?>" class="form-control" id="correo" name="correo" required>
                            </div>

                            <?php

                            //Impedimos cambiar el nivel de usuario de los tecnicos para evitar problemas con el modulo servicios

                            if ($datos['nivel'] != 'Tecnico'):

                            ?>

                            <div class="mb-3">
                                <label for="nivel" class="form-label">Nivel de usuario</label>
                                <select class="form-select" name="nivel">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Tecnico">Técnico</option>
                                    <option value="Secretaria de Compras">Secretaria de Compras</option>
                                    <option value="Secretaria de Ventas">Secretaria de Ventas</option>
                                    <option value="Cliente">Cliente</option>
                                </select>
                            </div>

                            <?php

                            endif;

                            if ($datos['nivel'] == 'Tecnico'):
                            
                            ?>

                                <input type="hidden" name="nivel" id="nivel" value="Tecnico">                                

                            <?php
                            endif;
                            ?>
                            <input type="hidden" name="id" value="<?php echo $datos['id_usuario']; ?>">
                            <div class="text-center d-grid gap-2">
                                <button type="submit" class="btn btn-success">Modificar Usuario</button>
                            </div>
                            <br>
                            <div class="text-center d-grid gap-2">
                                <button type="button" class="btn btn-danger" onclick="history.back()">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Datos Actuales del Usuario</h3>
                        <p><strong>Nombre:</strong> <?php echo $datos['nombre']; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $datos['telefono']; ?></p>
                        <p><strong>Correo Electrónico:</strong> <?php echo $datos['correo']; ?></p>
                        <p><strong>Nivel de usuario:</strong> <?php echo $datos['nivel']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php


endforeach;
require_once '../resources/layout/footer.php';


?>