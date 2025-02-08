<?php


$usuario = new Usuario();

$clientes = $usuario->obtenerClientes();
$tecnicos = $usuario->obtenerTecnicos();


?>


<div class="modal fade" id="modalServicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo Servicio</h5>
            </div>
            <div class="modal-body">
                <form id="formulario" action="<?php echo Route::service('crearServicio') ?>" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Escoga un Cliente:</label>
                        <select class="form-select" aria-label="Default select example" name="cliente" id="cliente">

                            <?php

                            foreach ($clientes as $cliente) {
                                echo "<option value=" . $cliente['id_usuario'] . ">" . $cliente['nombre'] . " | ID: " . $cliente['id_usuario'] . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Escoga un Tecnico:</label>
                        <select class="form-select" aria-label="Default select example" name="tecnico" id="tecnico">

                            <?php

                            foreach ($tecnicos as $tecnico) {
                                echo "<option value=" . $tecnico['id_usuario'] . ">" . $tecnico['nombre'] . " | ID: " . $tecnico['id_usuario'] . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripcion del servicio:</label>
                        <textarea name="descripcion" class="form-control" id="descripcion"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                        <input name="direccion" class="form-control" id="direccion" type="text">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Fecha de realizacion:</label>
                        <input name="fecha" class="form-control" id="fecha" type="date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" id="servicio"><i class="far fa-calendar-plus"></i> Registrar servicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>