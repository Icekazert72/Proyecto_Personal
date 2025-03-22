<?php

session_start();

require_once('../../php/conexion.php');

$email = $_POST['email'];
$contraseña = $_POST['password'];

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



                if ($usuario['tipo_usuario'] === 'admin') {
                    header("Location: ../../admin/index.php");
                    exit();
                } elseif ($usuario['tipo_usuario'] === 'cliente') {
                    header("Location: ../../session_iniciada.php");
                    exit();
                } else {
                    echo "Tipo de usuario no reconocido.";
                }
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró un usuario con ese email.";
        }
    }
} catch (Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}


$db->closeConnection();
