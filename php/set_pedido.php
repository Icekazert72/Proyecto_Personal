<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Iniciar la sesión para acceder a los datos del usuario
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado.']);
    exit;
}

// Obtener el id_usuario desde la sesión
$id_usuario = $_SESSION['id'];

// Obtener la dirección de envío desde la base de datos (ya proporcionada al crear cuenta)
$query_direccion = "SELECT direccion FROM usuarios WHERE id = $id_usuario";
$resultado = $conn->query($query_direccion);

// Verificar si el usuario tiene una dirección de envío
if (!$resultado || $resultado->num_rows == 0) {
    echo json_encode(['success' => false, 'message' => 'No se encontró la dirección de envío del usuario.']);
    exit;
}

$row = $resultado->fetch_assoc();
$direccion_envio = $row['direccion'];

// Recibir los detalles del carrito (productos y total) desde el frontend
$input = json_decode(file_get_contents('php://input'), true);

// Validar que los datos recibidos sean correctos
if (!isset($input['total']) || !isset($input['productos'])) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos enviados al servidor.']);
    exit;
}

// Obtener los detalles de la compra
$total = $input['total'];
$productos = $input['productos'];

// Iniciar la transacción
$conn->begin_transaction();

try {
    // Insertar el pedido
    $query_pedido = "INSERT INTO pedidos (id_usuario, total, direccion_envio) VALUES ($id_usuario, $total, '$direccion_envio')";
    $conn->query($query_pedido);
    
    // Obtener el ID del pedido recién insertado
    $id_pedido = $conn->insert_id;

    // Insertar los detalles del pedido
    foreach ($productos as $producto) {
        $subtotal = $producto['precio_unitario'] * $producto['cantidad'];
        $query_detalles = "INSERT INTO detalles_pedido (id_pedido, id_producto, cantidad, precio_unitario, subtotal) 
                           VALUES ($id_pedido, {$producto['id_producto']}, {$producto['cantidad']}, {$producto['precio_unitario']}, $subtotal)";
        $conn->query($query_detalles);
    }

    // Confirmar la transacción
    $conn->commit();

    // Enviar respuesta de éxito
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    // Si ocurre algún error, revertir la transacción
    $conn->rollback();
    header('Content-Type: application/json'); // Ensure JSON response
    echo json_encode(['success' => false, 'message' => 'Error al procesar el pedido: ' . $e->getMessage()]);
    exit;
}

// Cerrar la conexión
$conn->close();
?>
