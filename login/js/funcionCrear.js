
const formCrearCuenta = document.querySelector('#formCrearCuenta');
const loadingSpinner_craer = document.getElementById('loadingSpinner_craer');

formCrearCuenta.addEventListener('submit', function(e) {
    e.preventDefault(); // Evitar que se envíe el formulario de manera tradicional
    console.log("formulario funciona");
    
    // Obtener valores del formulario
    const nombre = document.getElementById('inputNombre').value;
    const apellido = document.getElementById('inputApellido').value;
    const correo = document.getElementById('inputCorreo').value;
    const telefono = document.getElementById('inputTelefono').value;
    const direccion = document.getElementById('inputDireccion').value;
    const con1 = document.getElementById('inputCon').value;
    const con2 = document.getElementById('inputCon2').value;

    // Validación del nombre (solo letras y espacios)
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+$/.test(nombre)) {
        document.getElementById('ErrNombre').textContent = "Nombre no válido.";
        return;
    } else {
        document.getElementById('ErrNombre').textContent = "";
    }

    // Validación del apellido (solo letras y espacios)
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+$/.test(apellido)) {
        document.getElementById('ErrApellido').textContent = "Apellido no válido.";
        return;
    } else {
        document.getElementById('ErrApellido').textContent = "";
    }

    // Validación del correo electrónico
    const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!regexCorreo.test(correo)) {
        document.getElementById('ErrCorreo').textContent = "Correo no válido.";
        return;
    } else {
        document.getElementById('ErrCorreo').textContent = "";
    }

    // Validación del teléfono (debe ser numérico y 10 dígitos)
    const regexTelefono = /^\d{9}$/;
    if (!regexTelefono.test(telefono)) {
        document.getElementById('ErrTelefono').textContent = "Teléfono no válido.";
        return;
    } else {
        document.getElementById('ErrTelefono').textContent = "";
    }

    // Validación de la dirección
    if (direccion.trim() === "") {
        document.getElementById('ErrDireccion').textContent = "Dirección no puede estar vacía.";
        return;
    } else {
        document.getElementById('ErrDireccion').textContent = "";
    }

    // Validación de la contraseña (debe tener al menos 6 caracteres)
    if (con1.length < 6) {
        document.getElementById('ErrCon').textContent = "La contraseña debe tener al menos 6 caracteres.";
        return;
    } else {
        document.getElementById('ErrCon').textContent = "";
    }

    // Validación de la coincidencia de las contraseñas
    if (con1 !== con2) {
        document.getElementById('ErrCon2').textContent = "Las contraseñas no coinciden.";
        return;
    } else {
        document.getElementById('ErrCon2').textContent = "";
    }

    // Mostrar el spinner mientras se crea la cuenta
    loadingSpinner_craer.style.display = 'flex';

    // Enviar los datos usando AJAX
    let xhr = new XMLHttpRequest();
    let formData = new FormData(formCrearCuenta);

    xhr.open('POST', './php/insertNew.php', true);

    xhr.onload = function() {
        loadingSpinner_craer.style.display = 'none'; // Ocultar el spinner después de recibir la respuesta
        let response = JSON.parse(xhr.responseText);
        console.log(xhr.responseText);

        if (response.status === 'error') {
            swal('Error', response.message, 'error');
        } else {
            swal('Éxito', response.message, 'success').then(() => {
                window.location.href = 'login.php'; // Redirigir a la página de inicio de sesión
            });
        }
    };

    xhr.onerror = function() {
        loadingSpinner_craer.style.display = 'none'; // Ocultar el spinner en caso de error
        swal('Error', 'Ocurrió un error, por favor intente nuevamente.', 'error');
    };

    xhr.send(formData);
});

