document.addEventListener('DOMContentLoaded', () => {
    const carritoButton = document.getElementById('carrito');
    const zonaCarrito = document.getElementById('zona-carrito');
    const cerrarCarritoButton = document.getElementById('cerrar-carrito');

    carritoButton.addEventListener('click', () => {
        zonaCarrito.style.display = 'flex';
    });

    cerrarCarritoButton.addEventListener('click', () => {
        zonaCarrito.style.display = 'none';
    });

// Array para almacenar productos seleccionados
let productosSeleccionados = [];

// Función para agregar un producto al carrito
function agregarProductoCarrito(id, nombre, precio) {
    // Verificar si el producto ya está en el carrito
    let productoExistente = productosSeleccionados.find(producto => producto.id === id);
    if (!productoExistente) {
        // Agregar el producto al carrito con cantidad 1
        productosSeleccionados.push({ id, nombre, precio, cantidad: 1 });
    } else {
        // Incrementar la cantidad si el producto ya está en el carrito
        productoExistente.cantidad++;
    }

    // Actualizar el contenido del carrito y el total
    actualizarCarrito();
    actualizarContadorCarrito(); // Animar el contador
}

// Función para actualizar el contenido del carrito
function actualizarCarrito() {
    const carritoContenido = document.getElementById('productos-en-carrito');
if (!carritoContenido) return; // Verificar si el elemento existe
    carritoContenido.innerHTML = ''; // Limpiar el contenido actual del carrito

    let totalCarrito = 0; // Variable para calcular el total

    // Si el carrito está vacío
    if (productosSeleccionados.length === 0) {
        carritoContenido.innerHTML = '<p>No hay productos en tu carrito.</p>';
    } else {
        productosSeleccionados.forEach(producto => {
            // Calcular el precio total por producto (precio * cantidad)
            const totalProducto = producto.precio * producto.cantidad;
            totalCarrito += totalProducto; // Sumar al total del carrito

            // Crear un contenedor para el producto
            const productoElement = document.createElement('div');
            productoElement.classList.add('producto-en-carrito');
            productoElement.innerHTML = `
                <p>${producto.nombre} - $${producto.precio} x <span class="cantidad">${producto.cantidad}</span> = $${totalProducto.toFixed(2)}</p>
                <button class="btn btn-incrementar" onclick="incrementarCantidad(${producto.id})">+</button>
                <button class="btn btn-reducir" onclick="decrementarCantidad(${producto.id})">-</button>
                <button class="btn btn-danger" onclick="eliminarProducto(${producto.id})">Eliminar</button>
            `;
            carritoContenido.appendChild(productoElement);
        });
    }

    // Actualizar el total del carrito
const totalCarritoElement = document.getElementById('total-carrito');
    if (totalCarritoElement) {
        totalCarritoElement.textContent = totalCarrito.toFixed(2);
}
}

// Función para incrementar la cantidad de un producto
window.incrementarCantidad = function(id) {
    let producto = productosSeleccionados.find(producto => producto.id === id);
    if (producto) {
        producto.cantidad++;
        actualizarCarrito();
        actualizarContadorCarrito(); // Animar el contador
    }
}

// Función para decrementar la cantidad de un producto
window.decrementarCantidad = function(id) {
    let producto = productosSeleccionados.find(producto => producto.id === id);
    if (producto && producto.cantidad > 1) {
        producto.cantidad--;
        actualizarCarrito();
        actualizarContadorCarrito(); // Animar el contador
    }
}

// Función para eliminar un producto del carrito
window.eliminarProducto = function(id) {
       productosSeleccionados = productosSeleccionados.filter(producto => producto.id !== id);

    // Actualizar el carrito después de la eliminación
    actualizarCarrito();
    actualizarContadorCarrito();
}

// Función para actualizar el contador de productos en el carrito
function actualizarContadorCarrito() {
    const contadorCarrito = document.getElementById('contador-carrito');
if (!contadorCarrito) return; // Verificar si el elemento existe
    const cantidadTotal = productosSeleccionados.reduce((total, producto) => total + producto.cantidad, 0);
    contadorCarrito.textContent = cantidadTotal;

    // Añadir la animación al contador
    contadorCarrito.classList.add('animar-contador');

    // Quitar la animación después de que termine
    setTimeout(() => {
        contadorCarrito.classList.remove('animar-contador');
    }, 500); // Duración de la animación
}

// Agregar event listeners a los divs de productos
document.querySelectorAll('.imagen').forEach(imagen => {
    imagen.addEventListener('click', function() {
        const id = imagen.getAttribute('data-id');
        const nombre = imagen.getAttribute('data-nombre');
        const precio = parseFloat(imagen.getAttribute('data-precio'));
        
        agregarProductoCarrito(id, nombre, precio);
    });
});

// Evento para el botón de finalizar compra
document.getElementById('finalizar-compra').addEventListener('click', function() {
    if (productosSeleccionados.length === 0) {
        alert('Tu carrito está vacío');
    } else {
        alert('¡Compra Finalizada!');
        // Limpiar el carrito
        productosSeleccionados = [];
        actualizarCarrito();
        
        // Ocultar la zona del carrito
        document.getElementById('zona-carrito').style.display = 'none';
    }
});

// Inicializar el carrito (esto es opcional si necesitas hacerlo desde el inicio)
actualizarCarrito();
});




