
function logout() {
    Swal.fire({
        title: "¿Seguro que quires cerrar sesion?",
        text: "No podras volveer a acceder a menos que inicies sesion nuevamente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, cerrar sesion",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "../../controllers/autenticar/logout.php";
        }
    });
}

function deleted(mensaje) {
    Swal.fire({
        icon: 'success',
        title: 'Eliminado',
        text: mensaje,
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if(result.isConfirmed) {
            location.reload();
        }
    });
}

function agregado(mensaje) {
    Swal.fire({
        icon: 'success',
        title: 'Agregado',
        text: mensaje
    }).then(() => {
        location.reload();
    });
}

function error(mensaje) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: mensaje
    });
}

function error_servidor() {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Hubo un error con el servidor'
    });
}