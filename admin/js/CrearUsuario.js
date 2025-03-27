const formCrearCuenta = document.querySelector('#Form_CrearUsuario');
const loadingSpinner_craer = document.getElementById('loadingSpinner_craer_usuarios');

formCrearCuenta.addEventListener('submit', function(e) {
    e.preventDefault(); // Evitar que se envíe el formulario de manera tradicional
    console.log("formulario funciona");
    
    // Obtener valores del formulario
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellidos').value;
    const correo = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;
    const direccion = document.getElementById('direccion').value;
    const con1 = document.getElementById('contraseña').value;

    // Validación del nombre (solo letras y espacios)
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+$/.test(nombre)) {
        new Swal({
            title: "Error",
            text: "Nombre no válido.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // Validación del apellido (solo letras y espacios)
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+$/.test(apellido)) {
        new Swal({
            title: "Error",
            text: "Apellido no válido.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // Validación del correo electrónico
    const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!regexCorreo.test(correo)) {
        new Swal({
            title: "Error",
            text: "Correo no válido.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // Validación del teléfono (debe ser numérico y 9 dígitos)
    const regexTelefono = /^\d{9}$/;
    if (!regexTelefono.test(telefono)) {
        new Swal({
            title: "Error",
            text: "Teléfono no válido. Debe tener 9 dígitos.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // Validación de la dirección
    if (direccion.trim() === "") {
        new Swal({
            title: "Error",
            text: "Dirección no puede estar vacía.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // Validación de la contraseña (debe tener al menos 6 caracteres)
    if (con1.length < 6) {
        new Swal({
            title: "Error",
            text: "La contraseña debe tener al menos 6 caracteres.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // Mostrar el spinner mientras se crea la cuenta
    loadingSpinner_craer.style.display = 'flex';

    // Enviar los datos usando AJAX
    let xhr = new XMLHttpRequest();
    let formData = new FormData(formCrearCuenta);

    xhr.open('POST', '../../admin/php/CrearUsuario.php', true);

    xhr.onload = function() {
        loadingSpinner_craer.style.display = 'none'; // Ocultar el spinner después de recibir la respuesta

        // Verificar si la respuesta del servidor es HTML o JSON
        let responseText = xhr.responseText;

        // Intentar parsear la respuesta como JSON
        try {
            let response = JSON.parse(responseText); // Intentar parsear como JSON

            if (response.status === 'error') {
                new Swal({
                    title: "Error",
                    text: response.message,
                    icon: "error",
                    confirmButtonText: "Aceptar"
                });
            } else {
                new Swal({
                    title: "Éxito",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    window.location.href = '#'; // Redirigir a la página de inicio de sesión
                });
            }
        } catch (e) {
            // Si la respuesta no es JSON, mostrar un error con el contenido recibido
            new Swal({
                title: "Error",
                text: 'La respuesta del servidor no es un formato válido. Respuesta recibida: ' + responseText,
                icon: "error",
                confirmButtonText: "Aceptar"
            });
        }
    };

    xhr.onerror = function() {
        loadingSpinner_craer.style.display = 'none'; // Ocultar el spinner en caso de error
        new Swal({
            title: "Error",
            text: 'Ocurrió un error, por favor intente nuevamente.',
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    };

    xhr.send(formData);
});

