<?php

require_once('../../php/conexion.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $con1 = $_POST['con1'];
    $con2 = $_POST['con2'];

    if ($con1 !== $con2) {
        die("Las contraseñas no coinciden.");
    }

    $hashedPassword = password_hash($con1, PASSWORD_DEFAULT);

  
    $tipo_usuario = 'cliente';  
    $fecha_creacion = date('Y-m-d H:i:s');  

    
    $db = new Database();
    $conn = $db->getConnection(); 
    
   
    $query = "INSERT INTO usuarios (nombre, apellido, email, telefono, direccion, contraseña, tipo_usuario, fecha_creacion) 
              VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$direccion', '$hashedPassword', '$tipo_usuario', '$fecha_creacion')";
    
   
    if ($conn->query($query) === TRUE) {
        echo "Registro exitoso!";
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
    
    
    $db->closeConnection();

}