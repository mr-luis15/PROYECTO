<?php

session_start();

$title = "Registrarse";
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/navar.php';

?>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Registrarse</h3>
                        <form action="<?php echo Route::user('registrarse'); ?>" method="POST">
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <button type="submit" class="btn btn-success">Registrarse</button>
                                <button type="button" class="btn btn-outline-secondary mt-2" onclick="document.location.href='<?php echo Route::url('login') ?>'">Iniciar sesion</button>
                            
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
