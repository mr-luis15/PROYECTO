// Función para eliminar usuario
function eliminarUsuario(userId) {
    Swal.fire({
        title: "¿Seguro que quieres eliminar este usuario?",
        text: "No lo podrás recuperar y todos los pedidos y servicios relacionados a este usuario serán borrados.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: '../../controllers/usuarios/eliminarUsuario.php',
                type: 'POST',
                data: { id: userId },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;

                    if (response.status === 'success') {
                        deleted(mensaje);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}

$(document).ready(function () {
    $('#enviar').on('click', function () {
        var data = {
            nombre: $('#nombre').val(),
            telefono: $('#telefono').val(),
            correo: $('#correo').val(),
            password: $('#password').val(),
            nivel: $('#nivel').val()
        };

        $.ajax({
            url: '../../controllers/usuarios/crearUsuario.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    agregado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})


$(document).ready(function () {
    $('#registrarse').on('click', function () {
        var data = {
            nombre: $('#nombre').val(),
            telefono: $('#telefono').val(),
            correo: $('#correo').val(),
            password: $('#password').val(),
        };

        $.ajax({
            url: '../../controllers/usuarios/registrarse.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    registrado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})



$(document).ready(function () {
    $('#login').on('click', function () {
        var data = {
            correo: $('#correo').val(),
            password: $('#password').val(),
        };

        $.ajax({
            url: '../../controllers/autenticar/login.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status == 'success') {
                    const nivel = response.nivel;
                    redirigirPorNivel(nivel);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})


$(document).ready(function () {
    $('#agregar_servicio').on('click', function () {
        var data = {
            cliente: $('#cliente').val(),
            tecnico: $('#tecnico').val(),
            direccion: $('#direccion').val(),
            descripcion: $('#descripcion').val(),
            fecha: $('#fecha').val(),

        };

        $.ajax({
            url: '../../controllers/servicios/crearServicio.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {

                const mensaje = response.message;

                if (response.status === 'success') {
                    agregado(mensaje);
                }

                if (response.status === 'error') {
                    error(mensaje);
                }
            },
            error: function (xhr, status, error) {
                error_servidor();
            }

        })
    })
})




function setRealizado(id_servicio) {
    Swal.fire({
        icon: 'warning',
        title: '¿Marcar como realizado?',
        text: 'Esto cambiara el estado del servicio a realizado',
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Marcar como realizado",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: '../../controllers/servicios/setRealizado.php',
                type: 'POST',
                data: { id: id_servicio },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;
                    const titulo = response.title;

                    if (response.status === 'success') {
                        ready(mensaje, titulo);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}


function eliminarServicio(id_servicio) {
    Swal.fire({
        icon: 'warning',
        title: '¿Eliminar servicio?',
        text: 'No podras recuperar el servicio una vez eliminado',
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: '../../controllers/servicios/eliminarServicio.php',
                type: 'POST',
                data: { id: id_servicio },
                dataType: 'json',
                success: function (response) {

                    const mensaje = response.message;
                    const titulo = response.title;

                    if (response.status === 'success') {
                        ready(mensaje, titulo);
                    }

                    if (response.status === 'error') {
                        error(mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    error_servidor(mensaje);
                }
            });
        }
    });
}




function redirigirPorNivel(nivel) {

    switch (nivel) {
        case 'Administrador':
            window.location.href = 'dashboard.php';
            break;

        case 'Secretaria de Compras':
            window.location.href = 'dashboard.php';
            break;

        case 'Secretaria de Ventas':
            window.location.href = 'dashboard.php';
            break;

        case 'Tecnico':
            window.location.href = 'dashboard.php';
            break;

        case 'Cliente':
            window.location.href = 'vistaCliente.php';
            break;
    }
}


