<?php

require_once('../../php/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $con1 = $_POST['contraseña'];
    $tipo_usuario = $_POST['tipo_usuario'];  // Añadir el campo tipo_usuario

    // Validar campos vacíos
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($direccion) || empty($con1) || empty($tipo_usuario)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
        exit;
    }

    // Validar nombre y apellido (solo letras y espacios)
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+$/", $nombre)) {
        echo json_encode(['status' => 'error', 'message' => 'El nombre no es válido.']);
        exit;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+$/", $apellido)) {
        echo json_encode(['status' => 'error', 'message' => 'El apellido no es válido.']);
        exit;
    }

    // Validar correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Correo electrónico no válido.']);
        exit;
    }

    // Validar teléfono (solo números y longitud de 9 dígitos)
    if (!preg_match('/^\d{9}$/', $telefono)) {
        echo json_encode(['status' => 'error', 'message' => 'Número de teléfono no válido. Debe tener 9 dígitos.']);
        exit;
    }

    // Validar dirección (no vacía)
    if (empty($direccion)) {
        echo json_encode(['status' => 'error', 'message' => 'La dirección no puede estar vacía.']);
        exit;
    }

    // Validar contraseña (al menos 6 caracteres)
    if (strlen($con1) < 6) {
        echo json_encode(['status' => 'error', 'message' => 'La contraseña debe tener al menos 6 caracteres.']);
        exit;
    }

    // Validar tipo de usuario (se espera un valor como 'cliente', 'admin', etc.)
    $tipos_validos = ['cliente', 'admin'];  // Puedes agregar más tipos de usuario si es necesario
    if (!in_array($tipo_usuario, $tipos_validos)) {
        echo json_encode(['status' => 'error', 'message' => 'Tipo de usuario no válido.']);
        exit;
    }

    // Hashear la contraseña
    $hashedPassword = password_hash($con1, PASSWORD_DEFAULT);

    // Verificar si el correo ya existe en la base de datos
    $db = new Database();
    $conn = $db->getConnection();
    $query = "SELECT id FROM usuarios WHERE email = '$correo'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'El correo electrónico ya está registrado.']);
        exit;
    }

    // Insertar el nuevo usuario
    $fecha_creacion = date('Y-m-d H:i:s');

    $query = "INSERT INTO usuarios (nombre, apellido, email, telefono, direccion, contraseña, tipo_usuario, fecha_creacion) 
              VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$direccion', '$hashedPassword', '$tipo_usuario', '$fecha_creacion')";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Usuario registrado exitosamente.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar el usuario: ' . $conn->error]);
    }

    // Cerrar la conexión
    $conn->close();
}
?>

