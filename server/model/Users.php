<?php

require_once '../config/Database.php';

class Users {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM dbo.Users";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
