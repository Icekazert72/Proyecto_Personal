<?php
header('Content-Type: application/json');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado.']);
    exit;
}

// Get the user ID from the session
$id_usuario = $_SESSION['id'];

// Include the database connection
require_once '../php/conexion.php';

try {
    // Fetch the latest order for the user
    $stmt = $conn->prepare("
        SELECT p.id AS id_pedido, p.fecha, p.total
        FROM pedidos p
        WHERE p.id_usuario = ?
        ORDER BY p.fecha DESC
        LIMIT 1
    ");
    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'No se encontraron pedidos para este usuario.']);
        exit;
    }

    $pedido = $result->fetch_assoc();

    // Fetch the products for the order
    $stmt = $conn->prepare("
        SELECT pr.nombre, dp.cantidad, dp.subtotal
        FROM detalle_pedidos dp
        INNER JOIN productos pr ON dp.id_producto = pr.id
        WHERE dp.id_pedido = ?
    ");
    $stmt->bind_param('i', $pedido['id_pedido']);
    $stmt->execute();
    $result = $stmt->get_result();

    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    // Return the ticket details
    echo json_encode([
        'success' => true,
        'ticket' => [
            'id_pedido' => $pedido['id_pedido'],
            'fecha' => $pedido['fecha'],
            'total' => $pedido['total'],
            'productos' => $productos
        ]
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    $db->closeConnection();
}
