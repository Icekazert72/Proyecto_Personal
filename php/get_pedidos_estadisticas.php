<?php
include('conexion.php');

header('Content-Type: application/json');

class PedidosEstadisticas {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerEstadisticas() {
        $query = "
            SELECT DATE_FORMAT(fecha_pedido, '%Y-%m') AS mes, COUNT(*) AS total
            FROM pedidos
            GROUP BY mes
            ORDER BY mes DESC
            LIMIT 12
        ";
        $stmt = $this->conn->query($query);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);

        $labels = [];
        $values = [];
        foreach ($results as $row) {
            $labels[] = $row['mes'];
            $values[] = $row['total'];
        }

        return [
            'label' => 'Pedidos por Mes',
            'labels' => $labels,
            'values' => $values
        ];
    }
}

$pedidosEstadisticas = new PedidosEstadisticas($conn);
$estadisticas = $pedidosEstadisticas->obtenerEstadisticas();

echo json_encode($estadisticas);

$conn->close();
?>
