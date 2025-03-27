<?php

class Database {
    private $host = 'localhost'; 
    private $dbname = 'ndongShoes'; 
    private $username = 'root';
    private $password = ''; 
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

$db = new Database();
$conn = $db->getConnection();
?>