<?php
include('conexion.php');

header('Content-Type: application/json');

class ProductosEstadisticas {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerEstadisticas() {
        $query = "
            SELECT categoria, COUNT(*) AS total
            FROM productos
            GROUP BY categoria
        ";
        $stmt = $this->conn->query($query);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);

        $labels = [];
        $values = [];
        foreach ($results as $row) {
            $labels[] = $row['categoria'];
            $values[] = $row['total'];
        }

        return [
            'label' => 'Productos por Categoría',
            'labels' => $labels,
            'values' => $values
        ];
    }
}

$estadisticas = new ProductosEstadisticas($conn);
echo json_encode($estadisticas->obtenerEstadisticas());

$conn->close();
?>
