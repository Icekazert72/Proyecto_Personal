// Array para almacenar productos seleccionados
let productosSeleccionados = [];

// Función para agregar un producto al carrito
function agregarProductoCarrito(id, nombre, precio) {
    // Verificar si el producto ya está en el carrito
    let productoExistente = productosSeleccionados.find(producto => producto.id === id);
    if (!productoExistente) {
        // Agregar el producto al carrito
        productosSeleccionados.push({ id, nombre, precio });

        // Actualizar el contenido del carrito en el modal
        actualizarCarrito();
    }
}

// Función para actualizar el contenido del modal con los productos en el carrito
function actualizarCarrito() {
    const carritoContenido = document.getElementById('carrito-contenido');
    carritoContenido.innerHTML = ''; // Limpiar el contenido actual del carrito

    productosSeleccionados.forEach(producto => {
        // Crear un contenedor para el producto
        const productoElement = document.createElement('div');
        productoElement.classList.add('producto-en-carrito');
        productoElement.innerHTML = `
            <p>${producto.nombre} - $${producto.precio}</p>
            <button class="btn btn-danger" onclick="eliminarProducto(${producto.id})"><i class="fa-solid fa-xmark"></i></button>
        `;
        carritoContenido.appendChild(productoElement);
    });
}

// Función para eliminar un producto del carrito
function eliminarProducto(id) {
    // Filtrar los productos para eliminar el seleccionado
    productosSeleccionados = productosSeleccionados.filter(producto => producto.id !== id);
    if (productosSeleccionados) {
        console.log('zapatilla borrada');
        
    } else {
        actualizarCarrito();
    }
    
    
}

// Agregar event listeners a los divs de productos
document.querySelectorAll('.imagen').forEach(imagen => {
    imagen.addEventListener('click', function() {
        const id = imagen.getAttribute('data-id');
        const nombre = imagen.getAttribute('data-nombre');
        const precio = imagen.getAttribute('data-precio');
        
        agregarProductoCarrito(id, nombre, precio);
        
    });
});

// Evento para el botón de finalizar compra
document.getElementById('guardarCambios').addEventListener('click', function() {
    if (productosSeleccionados.length === 0) {
        alert('Tu carrito está vacío');
    } else {
        alert('¡Compra Finalizada!');
        // Limpiar el carrito
        productosSeleccionados = [];
        actualizarCarrito();
        const modal = bootstrap.Modal.getInstance(document.getElementById('Modalcarrito'));
        modal.hide();
    }
});


actualizarCarrito();