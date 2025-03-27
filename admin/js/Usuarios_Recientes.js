document.addEventListener('DOMContentLoaded', function() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../../Proyecto_Fin_de_curso/php/get_recent_users.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const data = JSON.parse(this.responseText);
                const tbody = document.querySelector('#Usuarios_Recientes tbody');
                tbody.innerHTML = '';

                if (data.length > 0) {
                    data.forEach((user, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <th scope="row">${user.id}</th>
                            <td>${user.nombre}</td>
                            <td>${user.apellido}</td>
                            <td>${user.email}</td>
                            <td>${user.telefono}</td>
                            <td>${user.fecha_creacion}</td>
                        `;
                        tbody.appendChild(row);
                    });
                } else {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td colspan="6" class="text-center">Sin usuarios recientes</td>
                    `;
                    tbody.appendChild(row);
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching recent users:', this.statusText);
        }
    };
    xhr.onerror = function() {
        console.error('Request error...');
    };
    xhr.send();
});
