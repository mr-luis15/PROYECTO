<!-- Modal -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?php echo Route::user("crearUsuario") ?>" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Correo electronico:</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Telefono:</label>
                        <input type="number" class="form-control" name="telefono" placeholder="El telefono debe tener 10 digitos" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nivel de usuario:</label>
                        <select class="form-select" aria-label="Default select example" name="nivel">
                            <!--<option selected>Seleccona un nivel de usuario</option>-->
                            <option value="Administrador">Administrador</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Tecnico">Tecnico</option>
                            <option value="Secretaria de Compras">Secretaria de Compras</option>
                            <option value="Secretaria de Ventas">Secretaria de Ventas</option>
                            <!--<option value="Cliente">Cliente</option>-->
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Registrar usuario</button>
                    </div>
                    <input type="hidden" name="operador" value="crear">
                </form>
            </div>
        </div>
    </div>
</div>