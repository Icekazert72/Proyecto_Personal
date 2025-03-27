document.addEventListener('DOMContentLoaded', function() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../../Proyecto_Fin_de_curso/php/get_recent_orders.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const data = JSON.parse(this.responseText);
                if (data.error) {
                    console.error('Error del servidor:', data.error);
                    return;
                }

                const tbody = document.querySelector('#tbodyPedidosRecientes');
                tbody.innerHTML = '';

                if (data.length > 0) {
                    data.forEach((order, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <th scope="row">${index + 1}</th>
                            <td>${order.nombre_usuario}</td>
                            <td>${order.cant_productos}</td>
                            <td>${order.nombre_producto}</td>
                            <td>${order.fecha}</td>
                            <td>${order.total}</td>
                        `;
                        tbody.appendChild(row);
                    });
                } else {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td colspan="6" class="text-center">Sin pedidos recientes</td>
                    `;
                    tbody.appendChild(row);
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
                console.error('Respuesta del servidor:', this.responseText);
            }
        } else {
            console.error('Error fetching recent orders:', this.statusText);
        }
    };
    xhr.onerror = function() {
        console.error('Request error...');
    };
    xhr.send();
});
