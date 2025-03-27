<?php
include('conexion.php');

header('Content-Type: application/json'); // Asegurar que la salida sea JSON

try {
    $db = new Database();
    $conn = $db->getConnection();

    $query = "SELECT 
                p.id AS id_pedido, 
                u.nombre AS nombre_usuario, 
                SUM(dp.cantidad) AS cant_productos, 
                GROUP_CONCAT(pr.nombre SEPARATOR ', ') AS nombre_producto, 
                p.fecha_pedido AS fecha, 
                p.total 
              FROM pedidos p
              JOIN usuarios u ON p.id_usuario = u.id
              JOIN detalles_pedido dp ON p.id = dp.id_pedido
              JOIN productos pr ON dp.id_producto = pr.id
              GROUP BY p.id
              ORDER BY p.fecha_pedido DESC
              LIMIT 10";

    $result = $conn->query($query);

    $orders = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }

    echo json_encode($orders);
} catch (Exception $e) {
    // En caso de error, devolver un JSON con el mensaje de error
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>
