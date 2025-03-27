<?php
include('conexion.php');

header('Content-Type: application/json');

class Products {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getReservedProducts() {
        $query = "
            SELECT 
                id, 
                nombre, 
                descripcion, 
                precio, 
                stock, 
                categoria 
            FROM productos 
            WHERE stock > 0 
            ORDER BY fecha_creacion DESC 
            LIMIT 10
        ";
        $stmt = $this->conn->query($query);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);

        return $results;
    }
}

$productsClass = new Products($conn);
$products = $productsClass->getReservedProducts();

echo json_encode($products);
$conn->close();
?>
