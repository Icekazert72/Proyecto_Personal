<?php
include('conexion.php');

header('Content-Type: application/json');

class UsuariosEstadisticas {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerEstadisticas() {
        $query = "
            SELECT DATE_FORMAT(fecha_creacion, '%Y-%m') AS mes, COUNT(*) AS total
            FROM usuarios
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
            'label' => 'Usuarios por Mes',
            'labels' => $labels,
            'values' => $values
        ];
    }
}

$estadisticas = new UsuariosEstadisticas($conn);
echo json_encode($estadisticas->obtenerEstadisticas());

$conn->close();
?>
