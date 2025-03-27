document.getElementById("Form_CrearProducto").addEventListener("submit", function(event) {
    event.preventDefault();  // Evitar envío tradicional del formulario

    // Obtener valores del formulario
    var nombre = document.getElementById('nombre').value;
    var descripcion = document.getElementById('descripcion').value;
    var precio = document.getElementById('precio').value;
    var stock = document.getElementById('stock').value;
    var categoria = document.getElementById('categoria').value;
    var imagen_url = document.getElementById('imagen_url').files[0];

    // Validación del lado del cliente
    if (!nombre || !descripcion || !precio || !stock || !categoria || !imagen_url) {
        Swal.fire({
            title: 'Error',
            text: 'Por favor complete todos los campos.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        return;
    }

    // Mostrar el spinner mientras se procesa la solicitud
    document.getElementById("loadingSpinner").style.display = "block";

    var formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('descripcion', descripcion);
    formData.append('precio', precio);
    formData.append('stock', stock);
    formData.append('categoria', categoria);
    formData.append('imagen_url', imagen_url);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../admin/php/CrearProducto.php', true);
    console.log(xhr.responseType);

    xhr.onload = function() {
        document.getElementById("loadingSpinner").style.display = "none";  // Ocultar spinner después de recibir la respuesta

        if (xhr.status == 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                     Swal.fire({
                        title: 'Éxito',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then(() => {
                        window.location.href = '#'; // Redirigir a la página de productos
                    });
                    document.getElementById("Form_CrearProducto").reset();
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            } catch (e) {
               Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema con la respuesta del servidor.'+xhr.responseText,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    };

    xhr.onerror = function() {
        document.getElementById("loadingSpinner").style.display = "none"; // Ocultar spinner en caso de error
        Swal.fire({
            title: 'Error',
            text: 'Ocurrió un error al enviar los datos. Intente nuevamente.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    };

    xhr.send(formData);
});