document.addEventListener('DOMContentLoaded', function() {
    loadChartData('PedidosEstadisticas', 'php/get_pedidos_estadisticas.php');
    loadChartData('UsuariosEstadisticas', 'php/get_usuarios_estadisticas.php');
    loadChartData('ProductosEstadisticas', 'php/get_productos_estadisticas.php');
});

function loadChartData(canvasId, url) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const data = JSON.parse(this.responseText);
                const ctx = document.getElementById(canvasId).getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: data.label,
                            data: data.values,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching data:', this.statusText);
        }
    };
    xhr.onerror = function() {
        console.error('Request error...');
    };
    xhr.send();
}
