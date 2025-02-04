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
                data: { id: userId},
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

$(document).ready(function() {
    $('#enviar').on('click', function() {
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

/*
// Función para agregar usuario
function agregarUsuario() {
    
    var parametros = $('#formulario').serialize();

    $.ajax({
        url: '../../controllers/usuarios/crearUsuario.php',
        type: 'POST',
        data: {parametros},
        dataType: 'json',
        success: function (response) {

            if (response.status === 'success') {
                agregado();
            }

            if (response.status === 'error') {
                error();
            }
        },
        error: function (xhr, status, error) {
            error_servidor();
        }
    });
}
*/

