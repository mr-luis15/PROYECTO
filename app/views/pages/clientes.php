<?php

session_start();

$title = 'Clientes';
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Usuario.php';

?>
<div class="main">
    <h2>Lista de Clientes</h2>
    <div class="table-responsive">
        <button class="btn btn-primary" style="margin: 3vh 0vh 3vh 0vh;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="fas fa-user-plus"></i> Agregar cliente</button>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Correo</td>
                    <td>Telefono</td>
                    <td>Nivel</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php

                $usuarios = new Usuario();
                $listado = $usuarios->obtenerClientes();

                if ($listado) {
                    foreach ($listado as $usuario) {

                        ?>
                        <tr>
                            <td><?= $usuario['id_usuario']; ?></td>
                            <td><?= $usuario['nombre']; ?></td>
                            <td><?= $usuario['correo']; ?></td>
                            <td><?= $usuario['telefono']; ?></td>
                            <td><?= $usuario['nivel']; ?></td>
                            <td>
                                <a class="btn btn-danger" onclick="eliminarUsuario(<?php echo $usuario['id_usuario'] ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <a href="<?= htmlspecialchars(Route::url('editarUsuario') . '?id=' . $usuario['id_usuario']) ?>"
                                    class="btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }

                if (!$listado) {
                    echo "<h2>No hay nada</h2>";
                }

                ?>
            </tbody>
        </table>
    </div>
</div>


<?php

require_once '../resources/layout/footer.php';
require_once '../resources/layout/form_clientes.php';

?>