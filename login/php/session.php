<?php

session_start();
require_once('../../php/conexion.php');

$email = $_POST['email'];
$contraseña = $_POST['password'];

$response = [];

try {
    $db = new Database();
    $conn = $db->getConnection();

    if ($conn) {
        $query = "SELECT id, nombre, apellido, email, telefono, direccion, contraseña, tipo_usuario FROM usuarios WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            if (password_verify($contraseña, $usuario['contraseña'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['apellido'] = $usuario['apellido'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['telefono'] = $usuario['telefono'];
                $_SESSION['direccion'] = $usuario['direccion'];
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

                $response['status'] = 'success';
                $response['message'] = 'Login exitoso';

                if ($usuario['tipo_usuario'] === 'admin') {
                    $response['redirect'] = '../../../Proyecto_Fin_de_curso/admin/index.php'; 
                } elseif ($usuario['tipo_usuario'] === 'cliente') {
                    $response['redirect'] = '../../../Proyecto_Fin_de_curso/session_iniciada.php';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Tipo de usuario no reconocido.';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Contraseña incorrecta.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'No se encontró un usuario con ese email.';
        }
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Error en la conexión: ' . $e->getMessage();
}

$db->closeConnection();

echo json_encode($response);

?>


