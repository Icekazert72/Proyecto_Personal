<?php
require_once 'conexion.php';

// Crear una instancia de la clase Database
$db = new Database();

// Obtener la conexión
$conn = $db->getConnection();

// Consulta para obtener los productos
$query = "SELECT id, nombre, descripcion, precio, stock, categoria, imagen_url FROM productos";
$result = $conn->query($query);

// Verificar si hay productos
$productos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Devolver los productos en formato JSON
header('Content-Type: application/json');
echo json_encode($productos);

// Cerrar la conexión
$db->closeConnection();
?>

