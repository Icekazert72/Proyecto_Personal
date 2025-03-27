<?php
require_once('../../php/conexion.php'); // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    
    // Validación del Nombre
    if (empty($nombre) || !preg_match("/^[a-zA-Z0-9\s]+$/", $nombre)) {
        echo json_encode(['status' => 'error', 'message' => 'El nombre del producto no es válido.']);
        exit;
    }

    // Validación de la Descripción
    if (empty($descripcion)) {
        echo json_encode(['status' => 'error', 'message' => 'La descripción no puede estar vacía.']);
        exit;
    }

    // Validación del Precio
    if (!is_numeric($precio) || $precio <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'El precio debe ser un número positivo.']);
        exit;
    }

    // Validación del Stock
    if (!is_numeric($stock) || $stock < 0) {
        echo json_encode(['status' => 'error', 'message' => 'El stock debe ser un número positivo.']);
        exit;
    }

    // Validación de la Categoría
    if (empty($categoria)) {
        echo json_encode(['status' => 'error', 'message' => 'La categoría no puede estar vacía.']);
        exit;
    }

    // Validación de la Imagen
    if (isset($_FILES['imagen_url']) && $_FILES['imagen_url']['error'] == 0) {
        $imageName = $_FILES['imagen_url']['name'];
        $imageTmpName = $_FILES['imagen_url']['tmp_name'];
        $imageSize = $_FILES['imagen_url']['size'];
        $imageError = $_FILES['imagen_url']['error'];
        $imageType = $_FILES['imagen_url']['type'];

        // Validar tipo de imagen
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($imageType, $allowedTypes)) {
            echo json_encode(['status' => 'error', 'message' => 'Solo se permiten imágenes JPG, JPEG o PNG.']);
            exit;
        }

        // Validar tamaño máximo de la imagen (5MB)
        if ($imageSize > 5 * 1024 * 1024) {
            echo json_encode(['status' => 'error', 'message' => 'La imagen es demasiado grande. El tamaño máximo es de 5MB.']);
            exit;
        }

        // Generar un nombre único para la imagen
        $imageNewName = uniqid('', true) . '.' . pathinfo($imageName, PATHINFO_EXTENSION);

        // Subir la imagen al servidor
        $uploadDir = '../uploads/';
        $uploadFile = $uploadDir . $imageNewName;
        if (!move_uploaded_file($imageTmpName, $uploadFile)) {
            echo json_encode(['status' => 'error', 'message' => 'Error al subir la imagen.']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Por favor, suba una imagen.']);
        exit;
    }

    // Conectar a la base de datos
    $db = new Database();
    $conn = $db->getConnection();

    // Insertar el producto en la base de datos
    $query = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria, imagen_url, fecha_creacion)
              VALUES ('$nombre', '$descripcion', $precio, $stock, '$categoria', '$uploadFile', NOW())";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Producto creado con éxito.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al crear el producto: ' . $conn->error]);
    }

    // Cerrar la conexión
    $conn->close();
}
?>

