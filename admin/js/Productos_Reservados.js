document.addEventListener('DOMContentLoaded', function() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../../Proyecto_Fin_de_curso/php/get_reserved_products.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const data = JSON.parse(this.responseText);
                const tbody = document.querySelector('#Productos_Reservados tbody');
                tbody.innerHTML = '';

                if (data.length > 0) {
                    data.forEach((product, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <th scope="row">${product.id}</th>
                            <td>${product.nombre}</td>
                            <td>${product.descripcion}</td>
                            <td>${product.precio}</td>
                            <td>${product.stock}</td>
                            <td>${product.categoria}</td>
                        `;
                        tbody.appendChild(row);
                    });
                } else {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td colspan="6" class="text-center">Sin productos reservados</td>
                    `;
                    tbody.appendChild(row);
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching reserved products:', this.statusText);
        }
    };
    xhr.onerror = function() {
        console.error('Request error...');
    };
    xhr.send();
});
