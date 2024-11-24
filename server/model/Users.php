<?php

require_once __DIR__ . '/../config/Database.php';

class Users {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    function getAllUsers() {
        require_once '../config/Database.php';
        $sql = "SELECT * FROM dbo.Users";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}