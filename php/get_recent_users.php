<?php
include('conexion.php');

header('Content-Type: application/json');

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getRecentUsers() {
        $query = "
            SELECT 
                id, 
                nombre, 
                apellido, 
                email, 
                telefono, 
                fecha_creacion 
            FROM usuarios 
            ORDER BY fecha_creacion DESC 
            LIMIT 10
        ";
        $stmt = $this->conn->query($query);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);

        return $results;
    }
}

$user = new User($conn);
$users = $user->getRecentUsers();

echo json_encode($users);
$conn->close();
?>
